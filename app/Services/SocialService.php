<?php declare(strict_types=1);

namespace App\Services;

use App\Contracts\Social;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Contracts\User as BaseContract;

class SocialService implements Social
{
    /**
     * @param BaseContract $socialUser
     * @param string $network
     * @return string
     * @throws \Exception
     */
    public function loginUser(BaseContract $socialUser, string $network): string
    {
        $user = User::where('email', $socialUser->getEmail())->first();
        if($user) {
            $user->name = $socialUser->getName();
            $user->avatar = $socialUser->getAvatar();
            if ($user->save()) {
                Auth::loginUsingId($user->id);
                return route('account');
            }
        }else {
            $user = User::create([
                'name' => $socialUser->name,
                'email' => $socialUser->email,
                'password' => hash('sha256', $socialUser->token), // по идее надо генерить временный пароль и в аккаунте настойчиво напоминать его изменить
                'remember_token' => $socialUser->token,
                'avatar' => $socialUser->getAvatar(),
            ]);
            Auth::login($user);
            return route('account');
        }

        throw new \Exception("You get error from network:" . $network);
    }
}