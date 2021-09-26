<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FeedbackStore extends FormRequest
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
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'message' => ['required', 'string']
        ];
    }

    public function messages()
    {
        return [
            'required' => 'Поле :attribute обязательно для заполнения'
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'имя', 
            'email' => 'email адрес',
            'message' => 'сообщение'
        ];
    }
}
