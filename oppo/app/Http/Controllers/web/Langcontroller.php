<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Langcontroller extends Controller
{
    public  function set($lang, Request $request )
    {
        $acceptlang = ['ar' ,'en'];
        if(! in_array($lang , $acceptlang))
        {
            $lang ="en"; /*   معنااها  لو الاراي ديه مفهتش الحاجتين دول  خلي الديفولت  انجليزي */
        }
 /*احفظلي  متغير لانج دة في السيشن */
    $request->session()->put('lang',$lang);
    return back();

    }
}
