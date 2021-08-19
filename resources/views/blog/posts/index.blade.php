@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-right">
            <div class="col-md-12">
                <div class="card">
                    @if($errors->any())
                    <div class="row justify-content-center">
                        <div class="col-md-11">
                            <div class="alert alert-danger" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="close">
                                    <span aria-hidden="true">☓</span>
                                </button>
                                {{ $errors->first() }}

                        </div>
                    </div>
                @endif
                    <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Автор</th>
                                    <th>Заголовок</th>
                                    <th>Дата публикации</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($paginator as $post)
                                    <tr>
                                        <td>{{$post->user->name}}</td>
                                        <td>
                                            <a href="{{route('blog.post.view', $post->id)}}">{{$post->title}}</a>
                                        </td>
                                        <td>{{\Carbon\Carbon::parse($post->published_at)->format('d.m.Y') }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                                <tfoot></tfoot>
                            </table>
                    </div>
                </div>
            </div>
        </div>

            @if($paginator->total() > $paginator->count())

        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        {{$paginator->links()}}
                    </div>
                </div>
            </div>
        </div>
        @endif
    </div>
@endsection()