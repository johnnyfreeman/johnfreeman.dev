<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\TerminalResponse;

class RunCommandController
{
    public function __invoke(Request $request, $input)
    {
        return new TerminalResponse($input);
    }
}
