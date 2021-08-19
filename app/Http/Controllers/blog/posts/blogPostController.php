<?php

namespace App\Http\Controllers\blog\posts;

use App\Http\Controllers\blog\baseController;
use App\reprositories\blogPostReprository;

class blogPostController extends baseController
{

    private $blogPostReprository;

    public function __construct()
    {
        parent::__construct();

        // Подключаемся к репозиторию
        $this->blogPostReprository = app(blogPostReprository::class);

    }

    // Контроллер вывода всех записей
    public function archive(){

        $paginator = $this->blogPostReprository
                    ->getForPaginate(25);

        return view('blog.posts.index', compact('paginator'));
    }

    // Контроллер вывода одиночной записи
    public function singlePost($id){

        $post = $this->blogPostReprository
                     ->getForView($id);

            return view('blog.posts.single', compact('post'));
    }
}