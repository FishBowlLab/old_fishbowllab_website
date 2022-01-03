<?php

#use App\Http\Controllers\AdminController;
use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/products', 'PagesController@products');

Route::get("/submit", "PagesController@index"); // This blocks get requests for the submit form action
Route::post('/submit', 'PagesController@store');

#Auth::routes(['register'=>false]);
Auth::routes();


Route::group(["middleware" =>"auth"], function(){
    Route::resource("student/lessons", "LessonsCompletedController")->only(["show"]);  // Not sure if they need update
    Route::resource("student", "StudentController")->only(["index", "show", "store"]);

    // This needs to be fixed so it's more intuitive
    Route::get("student/lessons/{id}", "LessonsCompletedController@show");
    
    // Teacher Routes
    Route::group(["middleware"=> "checkUser"], function(){
        // Needs to be in front of teacher controller to be more specific
        Route::resource("teacher/modules", "ModulesController")->only(["index", "show"]);

        Route::resource("teacher", TeacherController::class)->except(["create"]);
        // Fix for passing ID to create method
        Route::get('teacher/create/{id}', 'TeacherController@create')->name("teacher.create");
    });

    // Admin Routes
    Route::group(["middleware"=> "checkAdmin"], function(){
        Route::resource("admin", AdminController::class);
    });
});

// Route for Mailing
Route::get('/email', function(){
    Mail::to('thefishbowllab@gmail.com')->send(new WelcomeMail());
    return new WelcomeMail();
});
