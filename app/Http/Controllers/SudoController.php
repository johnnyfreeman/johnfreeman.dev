<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\Kernel;

class SudoController extends Controller
{
    public function prompt(Request $request)
    {
        return view($request->ajax()
            ? 'output.sudo'
            : 'terminal', [
                'input' => 'sudo'
            ]);
    }

    public function once(Request $request, Kernel $kernel)
    {
        if (! Auth::once($request->only('password'))) {
            return redirect()->route('login')->withErrors([
                'password' => 'Sorry, try again.',
            ]);
        }

        return $kernel->handle($request->intended('intro'));
    }

    public function attempt(Request $request)
    {
        if (! Auth::attempt($request->only('password'))) {
            return redirect()->route('login')->withErrors([
                'password' => 'Sorry, try again.',
            ]);
        }

        $request->session()->regenerate();

        return redirect()->intended('intro');
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
