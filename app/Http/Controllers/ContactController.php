<?php

namespace App\Http\Controllers;

use App\Mail\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function contactSubmit(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'messageContent' => 'required|string'
        ]);

        Mail::to('no-reply@merokhutruke.com')->send(new Contact($request->name, $request->email, $request->messageContent));

        return redirect('/#contact')->with('success', 'Message sent successfully.');
    }
}
