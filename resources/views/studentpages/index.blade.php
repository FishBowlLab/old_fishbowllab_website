@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">{{ __('Dashboard') }}</div>
            <div class="card-body">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
                <p class="card-text">Welcome, {{$name}}</p>
                <p class="card-text">
                    Try the maze game to get familiar with block coding
                </p>
                <a href="https://blockly.games/maze?lang=en" class="btn btn-success">Intro Games</a>  
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">Lessons</div>
            {{--The first entry is the placeholder with a default value of 0--}}
            @if(count($lesson_data)>1)
                @foreach($lesson_data as $lesson)
                    @if($lesson->lesson_available != 0)
                        <div class="card-body">       
                                @if($lesson->completed_lesson_number > 0)
                                    <h4 class="card-title">Lesson {{$lesson->completed_lesson_number}}</h4>
                                    <p>{{$lesson->title}}</p>
                                    <a href="{{route("student.show", "$lesson->completed_lesson_number")}}" class="btn btn-primary">Lesson {{$lesson->completed_lesson_number}}</a>
                                    <div class="card-footer">
                                        <small class="text-muted">Completed at: {{$lesson->updated_at}} </small>
                                    </div> 
                                @else
                                    <h4>Lesson {{$lesson->lesson_available}}</h4>
                                    <p>{{$lesson->title}}</p>
                                    @if ($lesson->available_at ==0)
                                        <div class="card-footer">
                                            <small class="text-muted">This lesson is unavailable at this time </small>
                                        </div> 
                                    @else
                                        <a href="{{route("student.show", "$lesson->lesson_available")}}" class="btn btn-primary">Lesson {{$lesson->lesson_available}}</a>
                                        <div class="card-footer">
                                            <small class="text-muted">Status: Incomplete </small>
                                        </div> 
                                    @endif
                                @endif     
                        </div>
                    @endif
                @endforeach
            @else
                <p>No Lesson available at this time</p>
            @endif
        </div>
    </div>
</div>
@endsection