<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\Kernel;

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

    public function attempt(Request $request)
    {
        if ($this->hasTooManyLoginAttempts($request)) {
            return $this->sendLockoutResponse($request);
        }

        if (Auth::attempt($request->only('password'))) {
            return $this->sendLoginResponse($request);
        }
        
        $this->incrementLoginAttempts($request);
        
        return $this->sendFailedLoginResponse($request);
    }

    public function exit(Request $request)
    {
        Auth::logout();

        return view($request->ajax()
            ? 'output.success'
            : 'terminal', [
            'input' => 'exit',
            'message' => 'Logged out.',
        ]);
    }
}
