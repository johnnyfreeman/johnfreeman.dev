<?php

Route::get('/', function () {
    return view('terminal', ['input' => 'intro']);
});

Route::post('execute', function () {
    return redirect(request('input'));
});

Route::get('{input}', function ($input) {
    return view('terminal', compact('input'));
});
