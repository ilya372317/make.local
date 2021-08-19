<?php

namespace App\Observers;

use App\Models\BlogPost;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Str;

class blogPostObserver
{
    /**
     * Handle the BlogPost "created" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function created(BlogPost $blogPost)
    {
        //
    }

    public function creating(BlogPost $blogPost)
    {
        $this->setPublishTime($blogPost);
        $this->unsetPublishTime($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Handle the BlogPost "updated" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function updated(BlogPost $blogPost)
    {
        //
    }

    public function updating(BlogPost $blogPost)
    {
        $this->setPublishTime($blogPost);
        $this->unsetPublishTime($blogPost);
        $this->setSlug($blogPost);
    }

    /**
     * Handle the BlogPost "deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function deleted(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "restored" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function restored(BlogPost $blogPost)
    {
        //
    }

    /**
     * Handle the BlogPost "force deleted" event.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return void
     */
    public function forceDeleted(BlogPost $blogPost)
    {
        //
    }

    private function setSlug(BlogPost $blogPost){

        //если slug не был передан, тогда формируем его из title
        if (empty($blogPost->slug)) {
            $blogPost->slug = Str::slug($blogPost->title);
        }
    }

    private function setPublishTime(BlogPost $blogPost){

        //если пост опубликован, присвоить ему время публикации
        if (!empty($blogPost->is_published)) {
            $blogPost->published_at = Carbon::now();
        }
    }

    private function unSetPublishTime(BlogPost $blogPost){

        //если пост не опубликован и при этом существует дата публикации, очистить ее
        if (empty($blogPost->is_published && $blogPost->published_at)) {
            $blogPost->published_at = null;
        }

    }


}
