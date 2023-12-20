<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Mail\contactUS;
use Mail;

class ContactMailController extends Controller
{
    public function viewContact()
    {
        return view('contact');
    }

    public function send(request $request){
        $data = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'subject' => 'min:3',
            'message' => 'required|min:5',
        ]);

        Mail::to('lamiak.eloraby@gmail.com')->send(new contactUS($data));
    }


}
