<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
/*
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;'
*/
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

/* Resetting Password
Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');;

Route::post('/forgot-password', function (Request $request) {
    $request->validate(['email' => 'required|email']);

    $status = Password::sendResetLink(
        $request->only('email')
    );

    return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
})->middleware('guest')->name('password.email');

Route::get('/reset-password/{token}', function ($token) {
    return view('auth.reset-password', ['token' => $token]);
})->middleware('guest')->name('password.reset');

Route::post('/reset-password', function (Request $request) {
    $request->validate([
        'token' => 'required',
        'email' => 'required|email',
        'password' => 'required|min:8|confirmed',
    ]);

    $status = Password::reset(
        $request->only('email', 'password', 'password_confirmation', 'token'),
        function ($user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(60));

            $user->save();

            event(new PasswordReset($user));
        }
    );

    return $status === Password::PASSWORD_RESET
                ? redirect()->route('login')->with('status', __($status))
                : back()->withErrors(['email' => [__($status)]]);
})->middleware('guest')->name('password.update');
*/

Route::group(["middleware" =>"auth"], function(){
    Route::resource("student/lessons", "LessonsController")->only(["show"]);  // Not sure if they need update
    Route::resource("student", "StudentController")->only(["index", "show", "store"]);
    Route::get("student/lessons/{id}", "LessonsController@show");
    
    // Teacher Routes
    Route::group(["middleware"=> "checkUser"], function(){
        // Needs to be in front of teacher controller to be more specific
        Route::resource("teacher/modules", "ModulesController")->only(["index", "show"]);

        Route::resource("teacher", TeacherController::class)->except(["create"]);
        // Fix for passing ID to create method
        Route::get('teacher/create/{id}', 'TeacherController@create')->name("teacher.create");
    });
});
