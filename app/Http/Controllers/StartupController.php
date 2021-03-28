<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartupController
{
    public function __invoke(Request $request) {
        return call_user_func(new RunCommandController, $request, 'intro');
    }
}
