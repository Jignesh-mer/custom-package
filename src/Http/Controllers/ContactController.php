<?php

namespace Jigs\Contact\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

Use Jigs\Contact\Models\Contact;

Use Illuminate\Support\Facades\Mail;
Use Jigs\Contact\Mail\ContactMail;

class ContactController extends Controller
{
    public function index(){
        return view('contact::contact');
    }

    public function send(Request $request){
        Contact::create($request->all());
        Mail::to(config('contact.send_mail_to'))->send(new ContactMail());
        
        redirect(route('contact'));
    }
}
