<?php

namespace App\reprositories;

use App\Models\BlogPost as Model;
use Illuminate\Pagination\Paginator;

class blogPostReprository extends coreReprository{

    public function getModelClass(){
        return Model::class;
    }

    public function getForPaginate($itemPerPage = 5){

        Paginator::useBootstrap();

        // Колонки, из которых нужны данные для вывода всех статей.
        $columns = [
            'id',
            'user_id',
            'title',
            'slug',
            'is_published',
            'created_at',
        ];


        $item = $this->startCondition()
                ->select($columns)
                ->orderBy('id', 'DESC')
                // Благодоря связи с моделью user, сначала получаем необходимые данные, а потом выгружаем их на страницу
                ->with(['user' => function($query){
                    $query->select('id','name');
                }])
                ->paginate($itemPerPage);

        return $item;
    }

}

