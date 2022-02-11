<?php declare(strict_types=1);

namespace App\Http\Requests\News;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'category_id' => ['required', 'integer'],
            'source_id' => ['required', 'integer'],
            'title' => ['required', 'string', 'min:5'],
            'status' => ['required', 'string'],
            'image' => ['nullable', 'string', 'file', 'image', 'mimes:jpg,png'],
            'description' => ['nullable', 'string', 'max:200'],
            'fulltext' => ['nullable', 'string', 'max:3000'],
            'created_at' => ['nullable', 'timestamp'],
        ];
    }

    public function messages(): array
    {
        return parent::messages();
    }

    public function attributes(): array
    {
        return [
            'title' => '"Заголовок"',
        ];
    }
}
