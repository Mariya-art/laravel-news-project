<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Contracts\Social;
use Laravel\Socialite\Facades\Socialite;

class SocialController extends Controller
{
    public function redirect(string $network)
    {
        return Socialite::driver($network)->redirect();
    }

    public function callback(string $network, Social $service)
    {
        $user = Socialite::driver($network)->user();
        return redirect($service->loginUser($user, $network));
    }
}
