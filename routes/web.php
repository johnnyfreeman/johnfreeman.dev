<?php

use App\Mail\MessageCreated;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('terminal', ['input' => 'intro']);
});

Route::get('{input}', function ($input) {
    return view('terminal', compact('input'));
});

// handles terminal form submit
Route::post('execute', function () {
    return redirect(request('input'));
});

// Ajax calls made here get output
// of the command partial
Route::get('commands/{input}', function ($input) {
    return view("output.$input");
});

// handles contact form submit
Route::post('contact', function (Request $request) {
    $validator = Validator::make($request->only(['name', 'email', 'message']), [
        'name' => 'required',
        'email' => ['required','email'],
        'message' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect($request->ajax() ? 'commands/contact' : 'contact')
            ->withErrors($validator)
            ->withInput();
    }

    Mail::to('prsjohnny@gmail.com')->send(new MessageCreated($request->name, $request->email, $request->message));

    return view('output.success', [
        'message' => 'Message sent.'
    ]);
});
