<?php

namespace App\Listeners;

//use App\Jobs\NewUserJob;
use App\Notifications\WelcomeUserEmailNotification;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Teacher;
use App\Models\Student;

class NewUserListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  Registered  $event
     * @return void
     */
    public function handle(Registered $event)
    {
        //
        if($event->user->role == "teacher"){
            return Teacher::create([
                'teacher_id' => $event->user->id,
                'fname' => $event->user->fname,
                'lname' => $event->user->lname,
                'class_id' => 0,
            ]);
        }
        else{
            return Student::create([
                'student_id' => $event->user->id,
                'fname' => $event->user->fname,
                'lname' => $event->user->lname,
                'class_id' => 0,
            ]);
        }
        //$event->user->notify(new WelcomeUserEmailNotification());
    }
}
