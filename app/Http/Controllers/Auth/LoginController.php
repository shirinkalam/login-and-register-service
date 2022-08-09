<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    protected $redirectTo ='/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        #validate
        $this->validateForm($request);

        #check user and password
        #login
        #refirect {FALSE}
        if($this->attempLogin($request)){
            return $this->sendSuccessResponse();
        }

        #refirect {TRUE}
        $this->sendLoginFaildResponse();

    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'email'=>['required','string','email','exists:users'],
            'password'=>['required','min:8'],
        ]);
    }

    protected function attempLogin(Request $request)
    {
        #check user and password
        #login
        return Auth::attempt($request->only('email','password'),$request->filled('remember'));
    }

    protected function sendSuccessResponse()
    {
        session()->regenerate();
        return redirect()->intended();
    }

    protected function sendLoginFaildResponse()
    {
        return back()->with('wronCredentials',true);
    }

    public function logout()
    {
        session()->invalidate();

        Auth::logout();

        return redirect()->route('home');
    }
}
