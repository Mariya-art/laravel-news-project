<?php

namespace App\Http\Requests\Categories;

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
            'rus_name' => ['required', 'string', 'min:3'],
        ];
    }
    
    public function messages(): array
    {
        return parent::messages();
    }

    public function attributes(): array
    {
        return [
            'name' => '"Наименование категории"',
            'rus_name' => '"Наименование категории на русском языке"',
        ];
    }
}
