<?php

namespace App\Http\Requests\Sources;

use Illuminate\Foundation\Http\FormRequest;

class EditRequest extends FormRequest
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
            'real_name' => ['required', 'string', 'min:3'],
            'site' => ['required', 'string', 'min:3'],
        ];
    }
                        
    public function messages(): array
    {
        return parent::messages();
    }

    public function attributes(): array
    {
        return [
            'name' => '"Источник"',
            'real_name' => '"Название бренда"',
            'site' => '"Сайт"',
        ];
    }
}
