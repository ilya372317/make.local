@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h1>{{$post->title}}</h1>
                    <div class="containter">
                        <div class="row justify-content-left">
                            <div class="col-md-2">Автор статьи: <span style="font-weight: 700">{{$post->user->name}}</span></div>
                            <div class="col-md-10">Дата публикации: <span style="font-weight: 700">{{\Carbon\Carbon::parse($post->published_at)->format('d.m.Y') }}</span></div>
                        </div>
                        <br>
                    </div>
                    <p class="card-text">{{$post->content}}</p>
                </div>
             </div>
        </div>
    </div>
</div>
@endsection()