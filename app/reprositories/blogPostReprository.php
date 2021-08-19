<?php

namespace App\reprositories;

use App\Models\BlogPost as Model;
use Illuminate\Pagination\Paginator;

class blogPostReprository extends coreReprository{

    public function getModelClass(){
        return Model::class;
    }

    // Методы для браузера

    public function getForPaginate($itemPerPage = 5){

        Paginator::useBootstrap();

        // Колонки, из которых нужны данные для вывода всех статей.
        $columns = [
            'id',
            'user_id',
            'title',
            'slug',
            'is_published',
            'published_at',
        ];

        $paginator = $this->startCondition()
                ->where('is_published', '=', '1')
                ->select($columns)
                ->orderBy('id', 'ASC')
                // Благодоря связи с моделью user, сначала получаем необходимые данные, а потом выгружаем их на страницу
                ->with(['user' => function($query){
                    $query->select('id','name');
                }])
                ->paginate($itemPerPage);

        return $paginator;
    }

    // Метод получает данные для вывода одиночной записи
    public function getForView($id){

        // Колонки для вывода одиночной записи
        $columns = [
            'id',
            'user_id',
            'title',
            'content',
            'is_published',
            'published_at',
        ];

        $item = $this->startCondition()
                ->select($columns)
                ->findOrFail($id);

        return $item;
    }

    // Методы для API

    public function getForApiAll(){

        // Колонки для получения через API всех записей
        $columns = [
            'id',
            'user_id',
            'title',
            'content',
            'is_published',
            'published_at',
        ];

        $posts = $this->startCondition()
                ->select($columns)
                ->orderBy('id', 'ASC')
                // Благодоря связи с моделью user, сначала получаем необходимые данные, а потом выгружаем их на страницу
                ->with(['user' => function($query){
                    $query->select('id','name');
                }])
                ->get();

        return $posts;
    }

    public function getForApiSingle($id){

        // Колонки для получения через API одиночной записи
        $columns = [
            'id',
            'user_id',
            'title',
            'content',
            'is_published',
            'published_at',
        ];

        $item = $this->startCondition()
                ->select($columns)
                ->findOrFail($id);

        return $item;
    }

}
