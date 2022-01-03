@extends('layouts.app')

@section("content")
    <a href="/posts" class="btn btn-default">Go Back</a>
    <h1>{{$post->title}}</h1>
    <img style="width:50%" src="/storage/cover_images/{{$post->cover_image}}">
    <div>
        <!--This allows laravel to parse the html-->
        {!!$post->body!!}
    </div>
    <hr>
    <small>Written on {{$post->created_at}}</small>
    <hr>
    @if(!Auth::guest())
        @if(Auth::user()->id == $post->user_id)
            <a href="/posts/{{$post->id}}/edit" class="btn btn-dark">Edit</a>
            {!!Form::open(["action" => ["AdminController@destroy", $post->id],  'method' => "POST", "class" => "float-right"])!!}
                {{Form::hidden("_method", "DELETE")}}
                {{Form::submit("Delete", ["class"=>"btn btn-danger"])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection