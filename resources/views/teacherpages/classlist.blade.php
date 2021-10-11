@extends('layouts.app')

@section("content")
    <a href="/{{Auth::user()->role}}">Back</a>
    <!--Filter element-->
    <h1>Classlist</h1>
    <div class="row row-content">
        <div class="col-12">
            <ul class="nav nav-tabs nav-fill mb-3 btn-lg" role="tablist">
                @foreach ($class_ids as $c_id)
                    <li class="nav-item">
                        <a class="nav-link {{ $loop->first ? 'active' : ''}}" id="pills-{{$c_id->class_id}}-tab" data-toggle="pill" href="#class-{{$c_id->class_id}}" role="tab" aria-controls="pills-{{$c_id->class_id}}" aria-selected="true" onclick="switchState()">Class {{$c_id->class_id}}</a>
                    </li>
                @endforeach
            </ul>
            <!--Profile Media Cards-->
            @foreach ($class_ids as $c_id)
                <div class="tab-content">
                    <!--Profile Data-->
                    <div class="tab-pane fade show {{ $loop->first ? 'active' : ''}}" id="class-{{$c_id->class_id}}" role="tabpanel" aria-labelledby="pills-{{$c_id->class_id}}-tab" >
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
                                    @foreach ($studentlists as $student)
                                        @if($student->class_id == $c_id->class_id)
                                            <tr>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->class_id}}</td>
                                                <td>{{$student->completed_lesson_number}}</td>
                                            </tr>
                                        @endif
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!--Profile Data-->
                </div>
            @endforeach
            <!--Profile Media Cards-->
        </div>
    </div>
    <!--Filter element-->
    <script>
        /*Removes the active states so that bootstrap can proceed with the navigation*/
        function switchState(){
            Array.from(document.querySelectorAll('.active')).forEach((el) => el.classList.remove('active'));
        }
    </script>
@endsection
{{--Initial Logic for table generation--}}
{{--
@foreach ($class_ids as $c_id)
<h2>{{$c_id->class_id}}</h2>
<table class="table">
   <tr>
       <th>Name</th>
       <th>Class</th>
       <th>Modules</th>
   </tr>
   @foreach ($studentlists as $student)
       @if($student->class_id == $c_id->class_id)
           <tr>
               <td>{{$student->name}}</td>
               <td>{{$student->class_id}}</td>
               <td>Module Completed</td>
           </tr>
       @endif
   @endforeach
</table>
@endforeach
--}}