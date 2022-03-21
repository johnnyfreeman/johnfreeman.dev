<?php

namespace App\Http\Controllers;

use App\Http\TerminalResponse;
use App\Myself;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\HtmlString;
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

        return (new TerminalResponse('success'))->with([
            'input' => 'success',
            'message' => 'Message sent.',
        ]);
    }
}
