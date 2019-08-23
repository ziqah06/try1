<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\TestEmail;
use Mail;
use App\Contact;

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
            'email'=>'required |email', //valide tuk yg bukan email
            'message'=>'required'
            ]);

            $data = ['message' => $request->input('message')];
            Mail::to($request->input('email'))->send(new TestEmail($data)); 
            
            $post = new Contact();
            $post->email = $request->input('email');
            $post->message = $request->input('message');
            //$post->user_id = auth()->user()->id;
            //$post->cover_image = $filenameToStore;
            $post->save();
           
            //return redirect('/formEmail')->with('success', 'Send Email Successfully!!!'); 
            // /formEmail-> next page url after success
            return redirect('/home')->with('success', 'Send Email Successfully!!!');
    }
}
