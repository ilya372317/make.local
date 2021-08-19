<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\blogPostStoreRequest;
use App\Http\Requests\blogPostUpdateRequest;
use App\Http\Resources\blogPostResource;
use App\Models\BlogPost;
use App\reprositories\blogPostReprository;
use Illuminate\Http\Request;
use Response;

class blogPostController extends baseController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

     private $blogPostReprository;

     public function __construct()
     {

         $this->blogPostReprository = app(blogPostReprository::class);
     }

    public function index()
    {
        $posts = blogPostResource::collection($this->blogPostReprository->getForApiAll());
        return $posts;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(blogPostStoreRequest $request)
    {
        $data = BlogPost::create($request->validated());

        $result = new blogPostResource($data);

        return $result;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = $this->blogPostReprository
                ->getForApiSingle($id);

        return $item;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(blogPostUpdateRequest $request, $id)
    {

        $item = $this->blogPostReprository
                    ->getForApiSingle($id);

        $data = $request->validated();
        $result = $item->update($data);

        return $item;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = $this->blogPostReprository
                    ->getForApiSingle($id);

        $result = $item->delete();

        if($result){

        return Response('Запись успешно удалена');
    }
  }
}
