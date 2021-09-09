<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Cat;
use Illuminate\Http\Request;

class Homecontroller extends Controller
{
   public  function  index()
   {


       return view('web.home.index');
   }
}
