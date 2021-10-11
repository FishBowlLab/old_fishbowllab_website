<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lesson;

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
        $lessons = Lesson::where("student_id", $user_id)->get();
        $data = [
            "name" => ucwords($user->name),
            "lessons" => $lessons,
            "role" => $user->role,
        ];
        if ($user->role == "teacher"){
            return view("teacherpages.index")->with($data);
        }
        
        // Return default dashboard
        return view("dashboard")->with($data);
    }
}
