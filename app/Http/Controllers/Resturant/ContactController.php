<?php

namespace App\Http\Controllers\Resturant;

use App\Events\MailEvent;
use App\Mail\ContactUs;
use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Listeners\SendMailListener;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('front_pages.contact');
    }

    public function store(request $request){
        $request->validate([
            'name'=>'required|string|min:3',
            'email'=>'required|email|',
            'message'=>'required|string|min:10',
        ]);

        $message = new Contact();
        $message->name = $request->name;
        $message->email = $request->email;
        $message->message = $request->message;
        $message->save();

        $data = ['name'=>'ahmedmahfouz'];
        event(new MailEvent($data));
    }
}
