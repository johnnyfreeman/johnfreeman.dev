<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectToCommandController
{
    public function __invoke(Request $request) {
        return redirect(request('input'));
    }
}
