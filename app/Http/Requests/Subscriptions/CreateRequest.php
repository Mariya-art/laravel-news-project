<?php

namespace App\Http\Requests\Subscriptions;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => ['required', 'string', 'min:3'],
            'phone' => ['nullable', 'string', 'min:10'],
            'mail' => ['required', 'string', 'min:5'],
            'category_id' => ['required', 'integer'],
        ];
    }
            
    public function messages(): array
    {
        return parent::messages();
    }

    public function attributes(): array
    {
        return [
            'name' => '"Имя"',
            'mail' => '"E-mail"'
        ];
    }
}
