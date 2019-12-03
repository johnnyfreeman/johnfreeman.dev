<?php

use App\Mail\MessageCreated;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('terminal', ['input' => 'intro']);
});

Route::post('execute', function () {
    return redirect(request('input'));
});

Route::get('{input}', function ($input) {
    return view('terminal', compact('input'));
});

Route::get('partials/{input}', function ($input) {
    return view($input);
});

Route::post('contact', function (Request $request) {
    $validator = Validator::make($request->only(['name', 'email', 'message']), [
        'name' => 'required',
        'email' => ['required','email'],
        'message' => 'required',
    ]);

    if ($validator->fails()) {
        return redirect('partials/contact')
            ->withErrors($validator)
            ->withInput();
    }

    Mail::to('prsjohnny@gmail.com')->send(new MessageCreated($request->name, $request->email, $request->message));

    return view('contact');
});
