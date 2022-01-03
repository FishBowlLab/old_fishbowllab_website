<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\LessonCompleted;

class DashboardController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $lessons = LessonCompleted::where("student_id", $user_id)->get();
        $data = [
            "name" => ucwords($user->name),
            "lessons" => $lessons,
            "role" => $user->role,
        ];
        if ($user->role == "teacher"){
            return view("teacherpages.index")->with($data);
        }
        if($user->role == "admin"){
            return view("adminpages.index")->with($data);
        }
        
        // Return default dashboard
        return view("dashboard")->with($data);
    }
}
