<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Student;
use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     * 
     * @return void
     */
    public function __construct(){
        $this->middleware(["auth", "verified"]);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instructor_table = Teacher::distinct("class_id")->pluck("teacher_id", "class_id", );      // this will pluck the unique column and grab only the columns requested
        //$instructor_table = Teacher::all()->groupBy("class_id");            // This creates an associative array that holds the remainder of the queries as their values and the groupby as the key

        // Instructions:
        // select unique rows
        // left join user table on teacher table id
        
        /*
        $id = null;

        $student_table = Student::join("users", "users.id", "=" ,"students.student_id")
            ->join("lessons", "lessons.student_id", "=", "students.student_id")
            ->where("class_id", $id)    // Removes users outside of the classlist
            ->orderByDesc("students.student_id")
            ->get(["users.name","students.class_id", "lessons.completed_lesson_number"]);

        $data = [
            "students" => $students,
            "teachers" => $teachers,
            "student_table" => $student_table,
        ];
        */
        $data = [
            'instructor_table' => $instructor_table,
        ];
            // Need to paginate the table
            return view('adminpages.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
