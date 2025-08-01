<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendMail;

class SendEmailController extends Controller
{
    //
    function index(){
        //return view('emails.send_email');
        return view('emails.to_customer');
    }

    function send(Request $request){
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);

        $data = array(
            'name'      =>  $request->name,
            'message'   =>   $request->message
        );

        Mail::to('ayu.ameliaa@yahoo.co.id')->send(new SendMail($data));
        return back()->with('success', 'Thanks for contacting us!');
    }
}
