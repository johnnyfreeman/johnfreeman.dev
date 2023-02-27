<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\TerminalResponse;
use Illuminate\Support\Facades\Auth;

class SuController
{
    public function attempt(Request $request)
    {
        Auth::login($request->user());

        return redirect()->intended('intro');
    }

    public function exit(Request $request)
    {
        Auth::logout();

        return (new TerminalResponse('success'))->with([
            'input' => 'exit',
            'message' => 'Logged out.',
        ]);
    }
}
