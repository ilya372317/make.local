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
        $this->blogPostReprository = app(blogPostReprository::class);
    }

    public function archive(){

        $paginator = $this->blogPostReprository
                    ->getForPaginate(25);

        return view('blog.posts.index', compact('paginator'));
    }
}
