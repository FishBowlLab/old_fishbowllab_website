<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     * Old code
     * protected $redirectTo = RouteServiceProvider::DASHBOARD;
     * 
     * Source of change
     * https://kaloraat.com/articles/laravel-how-to-redirect-user-to-different-pages-based-on-different-user-role
     */
    protected function authenticated(Request $request, $user)
    {
        if($user->role == "teacher"){
            return redirect("/teacher");
        }
        else{
            return redirect("/student");
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
