<?php

namespace App\Http\Controllers;

use Session;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
session_start();

class ContactusController extends Controller
{
    public function index(){

        return view ('pages.contact_us');
    }
    public function send_mail(Request $request){

        Mail::send( new ContactMail ($request));

        return back()->with('message', 'Your message has been sent');
    }
}
