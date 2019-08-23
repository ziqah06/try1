<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Mail;

class ContactController extends Controller
{
    //
    public function formEmail()
    {
        return view('posts.formEmail');
    }

    public function test(Request $request)
    {
        $this->validate($request, [
            'email'=>'required',
            'message'=>'required'
            ]);

            $data = ['message' => $request->input('message')];
            Mail::to($request->input('email'))->send(new TestEmail($data)); 
            
           
            //return redirect('/formEmail')->with('success', 'Send Email Successfully!!!'); 
            // /formEmail-> next page url after success
            return redirect('/home')->with('success', 'Send Email Successfully!!!');
    }
}
