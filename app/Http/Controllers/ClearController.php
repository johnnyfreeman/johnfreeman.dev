<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Blade;

class ClearController
{
    public function __invoke(Request $request)
    {
        if ($request->wantsTurboStream()) {
            return turbo_stream()
                ->update('output', Blade::render('<x-input-form />'))
                ->toResponse($request);
        }

        return view('input-form');
    }
}
