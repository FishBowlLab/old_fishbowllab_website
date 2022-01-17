<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

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

    // Default maxAttempts is 5 and decayMinutes is 1
    use AuthenticatesUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo()
    {
        if (auth()->user()->role != null){
            return "/".auth()->user()->role;
        }
        return RouteServiceProvider::HOME;
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

    // Code taken from
    // https://laracasts.com/discuss/channels/laravel/how-to-integrate-throttle-in-custom-login-using-laravel-8
    public function login(Request $request)
    {
        if (method_exists($this, 'hasTooManyLoginAttempts') &&
            $this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        $credentials = $request->only('email', 'password');
        //$response = request('recaptcha');

        $data = [
            "email" => $credentials['email'],
            "password" => $credentials['password']
        ];

        $rules = [
            'email' => 'required',
            'password' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if (!$validator->fails()) {
            //if (Auth::attempt($credentials) && $this->checkValidGoogleRecaptchaV3($response)) {
            if (Auth::attempt($credentials)){ 
                //success
                return redirect($this->redirectTo());
            } else {
                //fail
                $this->incrementLoginAttempts($request);
                return redirect()->back()
                    ->withInput($request->all())
                    ->withErrors(['error' => 'Please check your username / password.']);
            }
        } else {
            return redirect('login')->withErrors($validator->errors())->withInput();
        }
    }

    /*
    public function checkValidGoogleRecaptchaV3($response)
    {
        $url = "https://www.google.com/recaptcha/api/siteverify";

        $data = [
            'secret' => "6Ldpye4ZAAAAAKwmjpgup8vWWRwzL9Sgx8mE782u",
            'response' => $response
        ];

        $options = [
            'http' => [
                'header' => 'Content-Type: application/x-www-form-urlencoded\r\n',
                'method' => 'POST',
                'content' => http_build_query($data)
            ]
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $resultJson = json_decode($result);

        return $resultJson->success;
    }
    */

    /************************************ */
    public function logout(Request $request)
    {
        $request->session()->flush();
        $request->session()->regenerate();
        Auth::logout();
        return redirect('/login');
    }
}
