<?php
namespace App\Services\Auth;

use App\Models\User;
use Illuminate\Http\Request;

class MagicAuthentication
{
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function requestLink()
    {
        $user = $this->getUser();
        #generate LINK
        $user->createTokenn();
        #send LINK;
    }

    protected function getUser()
    {
        return User::where('email',$this->request->email)->firstOrFail();
    }
}

