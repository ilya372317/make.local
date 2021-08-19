<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class blogPostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
       return [
           'id' => $this->id,
           'user_id' => $this->user_id,
           'title' => $this->title,
           'slug' => $this->slug,
           'content_html' => $this->content_html,
           'is_published' => $this->is_published,
           'published_at' => $this->published_at,

       ]
    }
}
