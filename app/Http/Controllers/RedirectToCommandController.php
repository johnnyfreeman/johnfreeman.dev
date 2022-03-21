<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Validation\ValidatesRequests;

class RedirectToCommandController
{
    use ValidatesRequests;

    public function __invoke(Request $request)
    {
        $validated = $this->validate($request, [
            'input' => ['required'],
        ]);

        return convertInputToRedirect($validated['input']);
    }
}
