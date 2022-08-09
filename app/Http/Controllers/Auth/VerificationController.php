<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VerificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify','resend');
    }

    public function send()
    {

        if(Auth::user()->hasVerifiedEmail()){
            return redirect()->route('home');
        }

        #get user
        #create signed route
        #send url
        Auth::user()->sendEmailVerificationNotification();
        #redirect

        return back()->with('verifationEmailSent',true);
    }
}
