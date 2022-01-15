@extends("layouts.app")

@section("content")
    <div class="jumbotron text-center">
        <h1><img class="logo" src="{{asset('/storage/images/logo.png')}}" alt="fishbowl-lab-logo"> {{$title}} </h1>
        
        <p>Modern tools for the future ready solutions</p>
        @guest
            <p>
                <a class="btn btn-primary btn-lg" href="/login" role="button">Login</a>
            </p>
        @endguest
    </div>
    <div class="row">
        <div class="col-12 col-md-8">
        </div>
        <div class="col-12 col-md-4">
            <h2>Sign up to stay up to date with new features</h2>
            {!! Form::open(['action' => "PagesController@store", 'method'=>'POST']) !!}
                <div class="form-group">
                    {{Form::text("firstname", "", ["class" => "form-control", "placeholder" => "First Name"])}}
                </div>
                <div class="form-group">
                    {{Form::text("lastname", "", ["class" => "form-control", "placeholder" => "Last Name"])}}
                </div>
                <div class="form-group">
                    {{Form::text("email", "", ["class" => "form-control", "placeholder" => "Email"])}}
                </div>
                {{Form::submit("Sign Up", ["class" => "btn btn-primary"])}}
            {!! Form::close()!!}
        </div>
    </div>
@endsection