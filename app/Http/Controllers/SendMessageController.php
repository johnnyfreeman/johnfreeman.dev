<?php

namespace App\Http\Controllers;

use App\Mail\ContactMessage;
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
            ->send(new ContactMessage($request->name, $request->email, $request->message));

        return view($request->ajax()
            ? 'output.success'
            : 'terminal', [
            'input' => 'success',
            'message' => 'Message sent.',
        ]);
    }
}
