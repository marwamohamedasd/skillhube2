<?php

namespace App\Http\Controllers\web;
use App\Models\Cat;
use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class catcontroller extends Controller
{
    public  function  show($id)
    {
        $data['cat'] = Cat::FindorFail($id);

        $data['allCats'] = Cat::select('id','name')->active()->get();
       // $data['skill'] = Skill::select('name','desc')->get();
        $data['skills'] = $data['cat']->skills()->active()->paginate(6) ;    // VIP
       // dd($data['skills']);

        return view('web.category.show')->with($data);


    }
}
