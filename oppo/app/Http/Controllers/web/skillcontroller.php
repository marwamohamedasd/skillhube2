<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Skill;
use Illuminate\Http\Request;

class skillcontroller extends Controller
{
    public  function  show($id)
    {  $data['skill'] = Skill::FindorFail($id);

    $data['allskills'] = Skill::select('id','name')->get();
        $data['exams'] = $data['skill']->exams()->paginate(4) ;
        return view('web.skill.show')->with($data);
    }

}
