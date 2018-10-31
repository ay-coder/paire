<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactUs(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            'email' => 'required|email',
            'contact' => 'required',
            'subject' => 'required',
            'description' => 'required',
        ]);
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact' => $request->input('contact'),
            'subject' => $request->input('subject'),
            'description' => $request->input('description'),
            'ip' => request()->ip()
        ];
        Mail::send('email/contact',$data,function($message){
            $message->to('sanket.adhvaryu@gmail.com','FOF ContactUs')->subject('New Contact Us email');
        });
        return redirect()->route('contact')->with('success','Thank your for your message, we will reach you in 24 hours');
    }
}
