@extends('layouts.app')

@section("content")
    <a href="/{{Auth::user()->role}}">Back</a>
    <!--Filter element-->
    <h1>Select Lessons: Class {{$id}}</h1>

    {!! Form::open(['action' => 'TeacherController@store','method'=>'POST']) !!}          
        <h5>
            Select all checkboxes for the lessons you wish your class to have access to.  
        </h5>
        @foreach($all_modules as $module)
            <div class="row justify-content-center">
                <div class="card w-100">
                    <div class="card-header">Lesson Number {{$module->id}}</div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                {{Form::hidden("class_id", $id)}}
                                {{Form::checkbox("modules[]", $module->id)}}
                                {{Form::label("module_expectation", $module->expectation)}}
                            </div>
                            <div class="col-9">
                                {{$module->title}}
                            </div>
                            <div class="col-1 d-none d-lg-block">
                                <a href="{{route("lessons.show", "$module->id")}}" class="btn btn-primary">Try</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{--For Pagination--}}
        {{$all_modules->links('pagination::bootstrap-4')}}
        <div class="row justify-content-center pt-1">
            {{Form::submit("Submit", ["class" => "btn btn-primary"])}}
        </div>
    {!! Form::close()!!}
@endsection
