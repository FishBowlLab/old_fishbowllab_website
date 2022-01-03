@extends('layouts.app')

@section("content")
    <p>This is the admin page</p>
    <a href="#" class="btn btn-primary">Create</a>
    <a href="#" class="btn btn-primary">Edit</a>
    
    <!-- Live Search Bar -->
    <div class="container">
        <div class="row">
            <select class="selectpicker" data-live-search="true">
                <optgroup label="Picnic">
                    <option>Mustard</option>
                    <option>Ketchup</option>
                    <option>Relish</option>
                </optgroup>
                <optgroup label="Camping">
                    <option>Tent</option>
                    <option>Flashlight</option>
                    <option>Toilet Paper</option>
                </optgroup>
            </select>
        </div>
    </div>
    <div>
        {{$instructor_table}}
    </div>
  <!-- Populate this table -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Instructor Name</th>
                <th scope="col">Section Code</th>
                <th scope="col">Number of Students</th>
            </tr>
        </thead>
        <tbody>
            @foreach($instructor_table as $instructor)
                <tr>
                    <td>{{$instructor}}</td>
                    <td></td>
                    <td></td>
                </tr>
           @endforeach
        </tbody>
    </table>
@endsection