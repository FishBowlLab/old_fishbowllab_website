@extends('layouts.dashboard')

@section('content')

<div class="row justify-content-center">
    <div class="card w-100">
        <div class="card-header">{{ __('Teacher Dashboard') }}</div>
        <div class="card-body">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <p>Welcome, {{$name}}</p>
        </div>
        {{--Only render tiles if the user has classes--}}
        @if ($class_amt > 0)
            <div class="row">
                @foreach ($class_ids as $c_id)
                    <!--Class Snapshot-->
                    <div class="col-sm-{{floor(12/$class_amt)}}">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title text-center">Class {{$c_id->class_id}}</h5>
                                <div class="media">
                                    <div class="media-body text-center">
                                        <a href="{{route("teacher.show", "$c_id->class_id")}}" class="btn btn-primary">View Class {{$c_id->class_id}}</a>
                                        <a href="{{route("teacher.create", "$c_id->class_id")}}" class="btn btn-success">Add Lesson(s)</a>
                                        <a href="{{route("teacher.edit", "$c_id->class_id")}}" class="btn btn-warning">Edit Lessons</a>
                                    </div>
                                </div>
                                <a href="#" class="card-text">Upcoming Information</a>
                            </div>
                        </div>
                    </div>
                    <!--Class Snapshot-->
                @endforeach
            </div>    
        @endif
    </div>
</div>
<div class="row justify-content-center">
    <div class="row-content w-100">
        <div class="card" >
            <div class="card-header">
                Class Analytics
            </div>
            <div class="card-body">
                <h5 class="card-title">Analytics Title</h5>
                <p class="card-text">Add Graph here.</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
        </div>
    </div>
</div>
<div class="row justify-content-center w-100">
    <div class="card w-100">
        <div class="card-header">Browse Lessons</div>
        <div class="card-body">
            <a href="{{route("modules.index")}}" class="btn btn-primary">Browse Lessons</a>
        </div>
    </div>
</div>
@endsection