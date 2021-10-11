<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lesson;
use App\Models\Student;
use App\Models\Module;


class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $user_id = auth()->user()->id;
        $user = auth()->user()->name;

        // At this moment, we students can only be active in one class at any moment
        $display=[
            "lessons.updated_at", 
            "teachers.lesson_available",
            "teachers.available_at",
            "lessons.completed_lesson_number",
            "modules.title"
        ];
        // Create a lesson subtable to join
        $lesson_subtable = Lesson::select("lessons.updated_at", "lessons.completed_lesson_number")
                                ->where("student_id", $user_id);
  
        // outer join teachers to students with class_id
        // left join lessons to new table with lessons
        $lesson_data = Student::where("students.student_id", $user_id)
                                ->join("teachers", "teachers.class_id", "=", "students.class_id", "left outer")
                                ->leftJoinSub($lesson_subtable, "lessons", function($join){
                                    $join->on("lessons.completed_lesson_number", "=", "teachers.lesson_available");
                                })
                                ->join("modules", "modules.id", "=", "teachers.lesson_available")
                                //->join("lessons", "teachers.lesson_available", "=", "lessons.completed_lesson_number", "left outer")
                                /*
                                ->join("lessons", function($join){
                                    $join->on("teachers.lesson_available", "=", "lessons.completed_lesson_number")
                                    ->where("students.student_id", '=', auth()->user()->id);
                                })*/
                                //->where("lessons.student_id", $user_id)
                                ->orderBy("teachers.lesson_available", "asc")
                                ->get($display);   
        $data = [
            "name" => ucwords($user),
            "lesson_data" => $lesson_data,
        ];
   
        return view("studentpages.index")->with($data);
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
        return "STORE";
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Checks for valid module ID between 0 and the max number of modules
        if ( 0 < $id && $id <= Module::count() ){
            return view("lessons.lesson_" . $id);
        }
        return abort(404);
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
