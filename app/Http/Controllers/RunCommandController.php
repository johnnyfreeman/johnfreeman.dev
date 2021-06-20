<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class RunCommandController
{
    public function __invoke(Request $request, $input)
    {
        $view = $request->ajax()
            ? "output.$input"
            : "terminal";

        if (!View::exists($view)) {
            abort('404');
        }

        $data = array_merge([
            'input' => $input
        ], $request->all());

        if ($request->wantsTurboStream()) {
            return turbo_stream()
                ->append('output', $view, $data);
        }

        return view($view, $data);
    }
}
