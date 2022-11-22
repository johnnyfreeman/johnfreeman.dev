<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\TerminalResponse;

class NoCommandController
{
    public function __invoke(Request $request)
    {
        return new TerminalResponse(
            $request->wantsTurboStream() ? 'blank' : 'intro'
        );
    }
}
