@extends('layouts.app')

@section("content")
    <a href="/">Back</a>
    <h1>Lessons</h1>

    <div class="card-header">Lessons</div>
        <div class="card-group">
            {{--This is the intro card that will always be here no matter what the is assigned--}}
            <div class="card">
                <img class="card-img-top" src="/storage/images/noimage.jpg" alt="Card image cap">
                <div class="card-body" style="position:relative">
                    <h4 class="card-title">Intro Games</h4>
                    <p class="card-text">
                        Try the maze game to get familiar with block coding
                    </p>
                        <a href="https://blockly.games/maze?lang=en" class="btn btn-primary" style="position:absolute; bottom:0;">Intro Games</a>  
                </div>
                <div class="card-footer">
                    <small class="text-muted">This is a placeholder</small>
                </div>
            </div>
            @foreach ($modules as $module)
                <div class="card">
                    <img class="card-img-top" src="/storage/images/noimage.jpg" alt="Card image cap">
                    <div class="card-body" style="position:relative">
                        <h4 class="card-title">Lesson {{$module->id}}</h4>
                        <h6>Expectation: {{$module->expectation}}</h6>
                        <p class="card-text">
                            {{$module->title}}
                        </p>
                        <a href="{{route("lessons.show", $module->id)}}" class="btn btn-primary" style="position:absolute; bottom:0;">To Lesson {{$module->id}}</a>
                    </div>
                    <div class="card-footer">
                        <small class="text-muted">Last updated {{$module->updated_at}}</small>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection