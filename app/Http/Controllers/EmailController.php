<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class EmailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validate = $request->validate([
            'vorname' => 'required',
            'nachname' => 'required',
            'email' => 'required|email',
            'nachricht' => 'required'
        ]);

        Mail::to('info@menueundco.ch')->send(new ContactMail($validate['vorname'], $validate['nachname'], $validate['email'], $validate['nachricht']));
    }
}
