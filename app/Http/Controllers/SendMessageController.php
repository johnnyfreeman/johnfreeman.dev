<?php

namespace App\Http\Controllers;

use App\Myself;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class SendMessageController
{
    public function __invoke(Request $request, Myself $me)
    {
        $validator = Validator::make($request->only(['name', 'email', 'message']), [
            'name' => 'required',
            'email' => ['required', 'email'],
            'message' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect('contact')
                ->withErrors($validator)
                ->withInput();
        }

        Mail::to($me->email)
            ->send(new ContactMessage($request->name, $request->email, $request->message));
        
        $data = [
            'input' => 'success',
            'message' => 'Message sent.',
        ];

        if ($request->wantsTurboStream()) {
            return turbo_stream()
                ->append('output', 'output.success', $data);
        }

        return view('terminal', $data);
    }
}
