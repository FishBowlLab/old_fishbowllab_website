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
                <p>Welcome, {{$name}}</p>
            </div>
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">Module Status</div>
            @if(count($modules)>0)
                @foreach ($modules as $module)
                    <div class="card">
                        <div class="row">                  
                            <div class="col-md-8 col-sm-8 pt-1 px-4">
                                @if($module->completed_module_number > 0)
                                    <h3>Module {{$module->completed_module_number}}</h3>
                                    <p>Completed at {{$module->updated_at}} </p> 
                                @else
                                    <p>Status: Incomplete</p> 
                                @endif       
                            </div>
                        </div>
                    </div>
                @endforeach
            @else
                <p>No Modules available at this time</p>
            @endif
        </div>
    </div>
    <div class="row justify-content-center">
        <div class="card w-100">
            <div class="card-header">Upcoming Modules</div>
            <div class="card">
                <div class="row justify-content-center py-2">
                    <a href="modules/blocklyTest" class="btn btn-primary">Click here to test the page</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
