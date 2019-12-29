<?php

use App\Mail\MessageCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

Route::get('/', function () {
    return view('terminal', ['input' => 'intro']);
});

Route::get('{input}', function ($input) {
    if (!View::exists("output.$input")) {
        abort('404');
    }

    return view('terminal', compact('input'));
});

// handles terminal form submit
Route::post('execute', function () {
    return redirect(request('input'));
});

// Ajax calls made here get output
// of the command partial
Route::get('commands/{input}', function ($input) {
    if (!View::exists("output.$input")) {
        abort('404');
    }

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

    Mail::to(config('mail.contact.address'))
        ->send(new MessageCreated($request->name, $request->email, $request->message));

    return view('output.success', [
        'message' => 'Message sent.'
    ]);
});
