<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Blade;

class ClearController
{
    public function __invoke(Request $request)
    {
        $output = Blade::render('<x-input-form />');

        if ($request->wantsTurboStream()) {
            return turbo_stream()
                ->update('output', $output)
                ->toResponse($request);
        }

        return view('terminal', [
            'output' => new HtmlString($output),
        ]);
    }
}
