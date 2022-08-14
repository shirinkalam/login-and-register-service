<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Services\Auth\TwoFactorAuthentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TwoFactorController extends Controller
{
    protected $twoFactor;

    public function __construct(TwoFactorAuthentication $twoFactor)
    {
        $this->middleware('auth');
        $this->twoFactor = $twoFactor ;
    }

    public function showToggleForm()
    {
        return view('auth.two-factor.toggle');
    }

    public function showEnterCodeForm()
    {
        return view('auth.two-factor.enter-code');
    }

    public function activate()
    {
        $response = $this->twoFactor->requestCode(Auth::user());

        return $response == $this->twoFactor::CODE_SENT
        ? redirect()->route('auth.two.factor.code.form')
        : back()->with('cantSentCode',true);
    }

    public function confirmCode(Request $request)
    {
        #validate CODE
        $this->validateForm($request);
        $response = $this->twoFactor->activate();

        return $request == $this->twoFactor::ACTIVATED
        ? redirect()->route('home')->with('twoFactorActivated',true)
        : back()->with('invalidCode',true);
    }

    protected function validateForm(Request $request)
    {
        $request->validate([
            'code'=>['required','numeric','digits:4']
        ],
        [
            'code.digits'=>__('auth.invalid code'),
        ]);
    }

    public function deactivate()
    {
        $this->twoFactor->deactivate(Auth::user());

        return back()->with('twoFactorDeactivated');
    }
}
