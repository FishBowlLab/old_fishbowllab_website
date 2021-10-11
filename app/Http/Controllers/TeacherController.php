<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Module;
use App\Models\Teacher;
use App\Models\Student;

class TeacherController extends Controller{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $teacher_id = auth()->user()->id;
        $teacher_name = auth()->user()->name;
        // Contains all unique classIDs for this specific teacher
        $class_ids = Teacher::select("class_id", "lesson_available")
                                ->where("teacher_id", $teacher_id)
                                ->orderby("class_id", "asc")
                                ->get()
                                ->unique("class_id");     
        $data = [
            "name" => ucwords($teacher_name),
            "class_ids" => $class_ids,
        ];
        return view("teacherpages.index")->with($data);
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request){
        $module_list = Module::orderBy("id", "asc")->paginate(5);       
        $data = [
            "all_modules" => $module_list,
            "id" =>$request->route("id"),
        ];
        return view("teacherpages.create")->with($data);
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        $teacher_id = auth()->user()->id;
        $selected_modules = $request->input("modules");
        $selected_class = $request->input("class_id");

        $currently_selected = Teacher::select("class_id", "lesson_available")
                                ->where("teacher_id", $teacher_id)
                                ->where("class_id", $selected_class)->get();
        
        // Redirect back to the page with error message if nothing is selected
        if ($selected_modules == null){
            return redirect(route("teacher.create", ["id" => $selected_class]))->with("error", "You have not selected any classes or lessons");
        }
        $lessons = [];      // Stores any lessons that need to be updated

            foreach($selected_modules as $module){
                if ($currently_selected->where("lesson_available", "=", $module)->first() == null){
                    // module doesn't exist and needs to be appended
                    array_push($lessons, [
                        "teacher_id" => $teacher_id,
                        "class_id" => $selected_class,
                        "lesson_available" => $module,
                        "created_at" =>  date('Y-m-d H:i:s'),
                        "updated_at" => date('Y-m-d H:i:s'),
                    ]);
                }
            }   

        // If no updates occured
        if (count($lessons) == 0){
            return redirect(route("teacher.create", ["id" => $selected_class]))->with("error", "You have already selected these lessons"); 
        }
        Teacher::insert($lessons);
        return redirect(auth()->user()->role)->with("success", "You have successfully updated your lessons");
    }

    /**
     * Display the specified resource.
     *
     * @param  $id classID 
     * @return \Illuminate\Http\Response
     */
    public function show($id){
        // Blocks user from seeing any class lists they aren't assigned to
        $check = Teacher::where("teacher_id", "=", auth()->user()->id)->where("class_id", "=",$id)->firstOrFail();

        if ($check == null){
            abort(404);
        }
            
        $student_table = Student::join("users", "users.id", "=" ,"students.student_id")
                                ->join("lessons", "lessons.student_id", "=", "students.student_id")
                                ->where("class_id", $id)    // Removes users outside of the classlist
                                ->orderByDesc("students.student_id")
                                ->get(["users.name","students.class_id", "lessons.completed_lesson_number"]);
        $data = [
            // Filters class
            "student_list" => $student_table,
            "class_number" => $id,
        ];
        // Return default dashboard
        return view("teacherpages.show")->with($data);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit($id){        
        $module_data = Teacher::join("modules", "teachers.lesson_available", "=" ,"modules.id")
                                ->where("class_id", $id)    // Removes users outside of the classlist
                                ->orderBy("lesson_available", "asc") // Not working at the moment
                                ->get(["modules.id", "modules.title","modules.expectation", "teachers.lesson_available", "teachers.available_at"]);

        $default_conditions = [
            "teacher_id" => auth()->user()->id,
            "class_id" => $id,
            "lesson_available" => 0,
        ];  
        // Look for default value of teacher's classlist
        $default = Teacher::where($default_conditions)->first();
        
        // Blocks other teachers from accessing other classes they are not assigned to
        if($default == null){
            abort(403);
        }
        // Redirects if the only entry is only the default value
        else if(count($module_data) == 0){
            return redirect("/teacher")->with("error", "You must add lessons to class ".$id." before editing");
        }

        $data = [
            // Filters class
            "module_data" => $module_data,
            "class_id" => $id,
        ];
        return view("teacherpages.edit")->with($data);
    }

     /**
     * Update the availability status of a lesson.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id){
        $conditions = [
            "teacher_id" => auth()->user()->id,
            "class_id" => $request->input("class_id"),
            "lesson_available" => $id,
        ];
        $status = Teacher::where($conditions)->firstOrFail();
        $status->updated_at = time();

        if ($status->available_at == 0){
            $status->available_at = 1;
            $status->save();
            return redirect(route("teacher.edit", $conditions["class_id"]))->with("success", "Lesson ".$id. " was made unavaiable");
        }
        else{
            $status->available_at = 0;
            $status->save();
            return redirect(route("teacher.edit", $conditions["class_id"]))->with("success", "Lesson ".$id." was made avaiable");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $lesson_id){
        // Add authentication layer here?

        $conditions = [
            "teacher_id" => auth()->user()->id,
            "class_id" => $request->input("class_id"),
            "lesson_available" => $lesson_id,
        ];
        // Look up record 
        $record = Teacher::where($conditions)->firstOrFail();
        $record->delete();

        // Redirect to same page if lessons still exist
        $all_records = Teacher::where("teacher_id", $conditions["teacher_id"])
                            ->where("class_id", $conditions["class_id"])->count();
        // count must be greater than 1 because we have 0 as a default in the table
        if ($all_records > 1){
            return redirect(route("teacher.edit", $conditions["class_id"]))->with("success", "Lesson ".$lesson_id." successfully deleted");
        }
        // Default returns to dashboard
        return redirect("/teacher")->with("success", "Lesson ".$lesson_id." successfully deleted");
    }
}
