<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use App\Auth\AuthenticatesRequests;
use App\Http\TerminalResponse;
use Illuminate\Support\Facades\Auth;

class SudoController
{
    use AuthenticatesRequests;

    public function prompt(Request $request)
    {
        return new TerminalResponse('sudo');
    }

    public function once(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (Auth::once($request->only('password'))) {
            return $this->sendLoginResponse($request);
        }
        
        $this->incrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }
}
