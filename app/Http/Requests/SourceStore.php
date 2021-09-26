<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SourceStore extends FormRequest
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
            'title' => ['required', 'string', 'min: 3', 'max: 199'],
            'category_id' => ['required', 'integer', 'min: 1'],
            'url' => ['required', 'url'],
            'description' => ['required']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute необходимо заполнить',
            'url' => 'Поле :attribute должно быть интернет-страницей'
        ];
    }

    public function attributes()
    {
        return [
            'title' => 'название источника',
            'description' => 'описание',
            'url' => 'ссылка на источник'
        ];
    }
}
