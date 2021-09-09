<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Message;
use App\Models\settingweb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class contactcontroller extends Controller
{
    public  function  index()

    {
        $data['sett'] = settingweb::select('email', 'phone')->first();
        return view('web.contact.index')->with($data);
    }


    public  function  send(Request $request)
    {

        // طريقة Ajax

        $request->validate([

            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'body' => 'required|string',


        ]);

        Message::create([


            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'body' => $request->body,

        ]);


        // $request->session()->flash('sucess','your message sent sucessfly');
        //Ajax

        $message = ['sucess' => 'your message sent sucessfly'];

        return Response::json($message);


        return back();

    }


}



        /*

          طريقة API العادية



        $validator = Validator::make($request->all(),[
            'name'=>'required|string|max:255',
            'email'=>'required|email|max:255',
            'subject'=>'nullable|string|max:255',
            'body'=>'required|string',
        ]);


        if($validator->fails())
        {
            $errors =$validator->errors();

           // return redirect(url('contact'))->withErrors($errors);
            //Ajax
            return Response::json($errors);
            //   حتاخد  اراي الايرور  تحولها لجيسون في الاجاكس
        }




          // $request->session()->flash('sucess','your message sent sucessfly');
         //Ajax

          $message =['sucess'=>'your message sent sucessfly'];

          return Response::json($message);


          return back();






    }
}
*/
