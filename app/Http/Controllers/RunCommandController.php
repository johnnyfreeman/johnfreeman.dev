<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RunCommandController
{
    public function __invoke(Request $request, $input)
    {
        if (!View::exists("output.$input")) {
            abort('404');
        }

        return view($request->ajax()
            ? "output.$input"
            : "terminal", array_merge([
                'input' => $input
            ], $request->all()));
    }
}
