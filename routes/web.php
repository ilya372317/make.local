<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Маршруты для блога.
Route::group(['prefix' => '/', 'namespace' => 'App\Http\Controllers\blog\posts\\'], function(){
    Route::get('',  'BlogPostController@archive')->name('blog.post.index');
    Route::get('/post/{id}', 'BlogPostController@singlePost')->name('blog.post.view');
});


