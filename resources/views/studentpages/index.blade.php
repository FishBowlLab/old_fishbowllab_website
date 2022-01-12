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
            @if(count($lesson_data)>0)
                @foreach($lesson_data as $lesson)
                    {{--Displays lesson cards--}}
                    <div class="card-body">
                        <h4 class="card-title">Lesson {{$lesson->lesson_number_available}}</h4>       
                        <p>{{$lesson->title}}</p>
                        {{--Incomplete Lessons--}}
                        @if($lesson->completed_lesson_number == null)
                            <a href="{{route("student.show", "$lesson->lesson_number_available")}}" class="btn btn-primary">Lesson {{$lesson->lesson_number_available}}</a>
                            <div class="card-footer">
                                <small class="text-muted">Status: Incomplete </small>
                            </div> 
                        {{--Unavailable Lessons--}}
                        {{--Should we allow people who have completed the lesson to have access to the lesson even when it is set to unavailable?--}}
                        @elseif ($lesson->availability == 0)
                            <div class="card-footer">
                                <small class="text-muted">This lesson is unavailable at this time </small>
                            </div>   
                        {{--Complete Lessons--}}
                        @else
                            <a href="{{route("student.show", "$lesson->lesson_number_available")}}" class="btn btn-primary">Lesson {{$lesson->lesson_number_available}}</a>
                            <div class="card-footer">
                                <small class="text-muted">Completed at: {{$lesson->updated_at}} </small>
                            </div>
                        @endif     
                    </div>
                @endforeach
            @else
                <p>No Lesson available at this time</p>
            @endif
        </div>
    </div>
</div>
@endsection