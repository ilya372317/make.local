<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogPostStoreRequest extends FormRequest
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
            'user_id' => 'exists:users,id',
            'title' => 'required|string|unique:blog_posts,title',
            'slug' => 'unique:blog_posts,slug|unique:blog_posts,slug',
            'content' => 'string|required',
            'is_published' => 'integer'
        ];
    }

    public function messages()
    {
        parent::messages();
        return [
            'title.unique' => 'Заголовок записи должен быть уникальным',
            'title.required' => 'Заголовок обязателен для заполнения',
            'title.string' => 'Заголовок должен иметь тип строки',
            'slug.unique' => 'Индификатор записи должен быть уникальным',
            'content.string' => 'Тело записи должно быть строкой',
            'content.required' => 'Тело записи обязательно для заполнения',
            'is_published.integer' => 'Ошибка публикации',
            'user_id.exists' =>  'Данного пользователя не существует'
        ];
    }
}
