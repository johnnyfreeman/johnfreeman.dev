<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth\AuthenticatesRequests;
use Illuminate\Support\Facades\Auth;

class SudoController extends Controller
{
    use AuthenticatesRequests;

    public function prompt(Request $request)
    {
        $view = $request->ajax()
            ? 'output.sudo'
            : 'terminal';

        return view($view, ['input' => 'sudo']);
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
