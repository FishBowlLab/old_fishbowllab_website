@extends('layouts.app')

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
    </div>
</div>
<div class="row justify-content-center">
    <!--Filter element-->
    <div class="row row-content w-100">
        <div class="card w-100" >
            <div class="card-header">
                Class Details
            </div>
            <ul class="nav nav-tabs nav-fill mb-3 btn-lg card-body" role="tablist">
                @foreach ($class_ids as $c_id)
                    <li class="nav-item" >
                        <a class="nav-link tab-colour {{ $loop->first ? 'active' : ''}}" id="pills-{{$c_id->class_id}}-tab" data-toggle="pill" href="#profile-{{$c_id->class_id}}" role="tab" aria-controls="pills-{{$c_id->class_id}}" aria-selected="true" onClick="switchState()">Class {{$c_id->class_id}}</a>
                    </li>
                @endforeach
            </ul>

            <!-- Media Cards-->
            <div class="tab-content card-body">
                @foreach ($class_ids as $c_id)
                    <!--Class Content-->
                    <div class="tab-pane fade show {{ $loop->first ? 'active' : ''}}" id="profile-{{$c_id->class_id}}" role="tabpanel" aria-labelledby="pills-{{$c_id->class_id}}-tab">
                        <div class="media">
                            <div class="media-body text-center">
                                <a href="{{route("teacher.show", "$c_id->class_id")}}" class="btn btn-primary">View Class {{$c_id->class_id}}</a>
                                <a href="{{route("teacher.create", "$c_id->class_id")}}" class="btn btn-success">Add Lesson(s)</a>
                                <a href="{{route("teacher.edit", "$c_id->class_id")}}" class="btn btn-warning">Edit Lessons</a>
                            </div>
                        </div>
                    </div>
                    <!--Class Content-->
                @endforeach
            </div>
            <!-- Media Cards-->
        </div>
    </div>
    <!--Filter element-->
<div class="row justify-content-center w-100">
    <div class="card w-100">
        <div class="card-header">Browse Lessons</div>
        <div class="row">
            <div class="card-body">
                <a href="{{route("modules.index")}}" class="btn btn-primary">Browse Lessons</a>
            </div>
        </div>
    </div>
</div>

<script>
    /*Removes the active states so that bootstrap can proceed with the navigation*/
    function switchState(){
        Array.from(document.querySelectorAll('.active')).forEach((el) => el.classList.remove('active'));
    }
</script>
@endsection
