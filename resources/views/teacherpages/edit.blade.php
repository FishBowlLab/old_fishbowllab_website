@extends('layouts.app')

@section("content")
    <a href="/{{Auth::user()->role}}">Back</a>
    <h1>Edit Lessons: Class {{$class_id}}</h1>
    <div class="row row-content">
        <div class="col-12">
            <div class="tab-content">
                <table class="table table-striped table-bordered text-center">
                    <thead>
                        <tr>
                            <th >Expectation</th>
                            <th>Title</th>
                            <th>Status</th>
                            <th>Change Access</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ($module_data as $module)
                            {!!Form::open(["action" => ["TeacherController@update", $module->lesson_available], "method" => "POST"])!!}
                                <tr>
                                    <td>{{$module->expectation}}</td>
                                    <td class="text-left">{{$module->title}}</td>
                                    
                                    @if ($module->available_at ==0)
                                        <td>Not Available</td>
                                        <td class="text-center">
                                            {{Form::submit("On", ["class" => "btn btn-success"])}}
                                        </td>
                                    @else
                                        <td><p>Available</p></td>
                                        <td class="text-center">
                                            {{Form::submit("Off", ["class" => "btn btn-secondary"])}}
                                        </td>
                                    @endif
                                    {{Form::hidden("class_id", $class_id)}}
                                    {{Form::hidden("_method", "PUT")}}
                                {!!Form::close()!!}

                                {!!Form::open(["action" => ["TeacherController@destroy", $module->lesson_available], "method" => "POST"])!!}
                                    {{Form::hidden("class_id", $class_id)}}
                                    {{Form::hidden("_method", "DELETE")}}
                                    <td>
                                        {{Form::submit("Delete", ["class"=>"btn btn-danger", "onclick" =>"return confirm('Are you sure you?')"])}}
                                    </td>
                                {!!Form::close()!!}
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection