@extends('layouts.app')

@section("content")
    <h1>Create Lesson</h1>
    {!! Form::open(['action' => 'App\Http\Controllers\LessonsController@store','method'=>'POST']) !!}
    <div class="form-group">
        {{Form::label("title", "Title")}}
        {{Form::text("title", "", ["class" => "form-control", "placeholder" => "Title"])}}
    </div>
    <div class="form-group">
        {{Form::label("body", "Body")}}
        {{Form::textarea("body", "", ["id" =>"editor", "class" => "form-control", "placeholder" => "Body Text"])}}
    </div>
    {{Form::submit("Submit", ["class" => "btn btn-primary"])}}
    {!! Form::close()!!}
    <script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
    <!--script src="{{ asset('js/ckeditor.js') }}" defer></!--script-->
    <script>
        CKEDITOR.replace('editor');
    </script>
@endsection