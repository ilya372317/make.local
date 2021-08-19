<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class blogPostUpdateRequest extends FormRequest
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
            'title' => 'unique:blog_posts,title',
            'slug' => 'unique:blog_posts,slug|unique:blog_posts,slug',
            'is_published' => 'integer'
        ];
    }

    public function messages()
    {
        parent::messages();
        return [
            'title.unique' => 'Заголовок записи должен быть уникальным',
            'slug.unique' => 'Индификатор записи должен быть уникальным',
            'is_published.integer' => 'Ошибка публикации',
            'user_id.exists' =>  'Данного пользователя не существует'
        ];
    }
}
