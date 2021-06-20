<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SuController extends Controller
{
    public function attempt(Request $request)
    {
        Auth::login($request->user());

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
