<?php

namespace App\Http\Controllers;

use App\Mail\MessageCreated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SendMessageController
{
    public function __invoke(Request $request) {
        $validator = Validator::make($request->only(['name', 'email', 'message']), [
            'name' => 'required',
            'email' => ['required','email'],
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        }

        Mail::to(config('mail.contact.address'))
            ->send(new MessageCreated($request->name, $request->email, $request->message));

        return view('output.success', [
            'message' => 'Message sent.'
        ]);
    }
}
