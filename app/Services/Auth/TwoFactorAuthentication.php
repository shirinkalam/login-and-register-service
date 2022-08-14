<?php
namespace App\Services\Auth;

use App\Models\TwoFactor;
use App\Models\User;
use Illuminate\Http\Request;

class TwoFactorAuthentication
{
    const CODE_SENT ='code.sent';
    const INVALID_CODE ='code.invalid';
    const ACTIVATED ='code.activated';

    protected $request;
    protected $code;

    public function __construct(Request $request)
    {
        $this->request = $request ;
    }


    public function requestCode(User $user)
    {
        #generate code
        $code = TwoFactor::generateCodeFor($user);
        #set code in session
        $this->setSession($code);
        #send code
        $code->send();
        #return response
        return static::CODE_SENT;

    }

    public function setSession(TwoFactor $code)
    {
        session([
            'code_id'=>$code->id,
            'user_id'=>$code->userid,
        ]);
    }

    public function activate()
    {
        #validate code
        if(!$this->isValidCode()) return static::INVALID_CODE;
        #delete code record
        $this->getToken()->delete();
        #activate two factor
        $this->getUser()->activateTwoFactor();
        #forget session
        $this->forgetSession();
        #return response
        return static::ACTIVATED;
    }

    protected function isValidCode()
    {
        return !$this->getToken()->isExpired() &&
        $this->getToken()->isEqualWith($this->request->code);
    }

    protected function forgetSession()
    {
        session(['user_id','code_id']);
    }

    protected function getToken()
    {
        return $this->code ?? TwoFactor::findOrFail(session('code_id'));
    }

    protected function getUser()
    {
        return User::findOrFail(session('user_id'));
    }

    public function deactivate(User $user)
    {
        return $user->deactivateTwoFactor();
    }
}
