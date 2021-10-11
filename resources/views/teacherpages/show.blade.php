@extends('layouts.app')

@section("content")
    <a href="/{{Auth::user()->role}}">Back</a>
    <!--Filter element-->
    <h1>Class {{$class_number}}</h1>
    <div class="row row-content">
        <div class="col-12">
            <!--Profile Media Cards-->
            <div class="tab-content">
                <!--Profile Data-->
                <div class="media">
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Class</th>
                                <th>Lesson Status (Fix display for multiple views)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($student_list as $student)
                                    <tr>
                                        <td>{{$student->name}}</td>
                                        <td>{{$student->class_id}}</td>
                                        <td>{{$student->completed_lesson_number}}</td>
                                    </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!--Profile Data-->
            </div>
            <!--Profile Media Cards-->
        </div>
    </div>
    <!--Filter element-->
@endsection
