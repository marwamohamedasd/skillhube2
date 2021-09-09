<?php

namespace App\Http\Controllers;

use App\Mail\ContactResponseMail;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class messagecontroller extends Controller
{

    public  function index()
    {

$data['messages'] = Message::orderBy('id','DESC')->paginate(10);

return view('admin.messages.index')->with($data);


    }

    public  function show(Message $message)
    {

        $data['message']= $message;

        return view('admin.messages.show')->with($data);



    }


    public  function  response(Message $message ,Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',

        ]);

       $recieveName =$message->name;
        $receiverMail = $message->email;
        Mail::to($receiverMail)->send(new ContactResponseMail($recieveName,$request->title, $request->body));

return redirect(url("dashboard/messages"));

    }



}
