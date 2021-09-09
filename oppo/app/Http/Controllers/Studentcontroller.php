<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class Studentcontroller extends Controller
{

    public  function index()
    {
          $studentrole = Role::where('name','student')->first();
          $data['students']= User::where('role_id',$studentrole->id)->orderBy('id','DESC')->paginate(5);

          return view('admin.students.index')->with($data);

    }


    public function showscore($id)
    {
        $student =  User::findOrFail($id);

        if($student->role->name !== 'student')
        {

            return back();
        }

        $data['student']=$student;
        $data['exams']=$student->exams;
return  view('admin.students.show-scores')->with($data);

    }

    public function openexam($studentid, $examid)
    {

        $student =  User::findOrFail($studentid);

        $student->exams()->updateExistingPivot($examid,['status'=> 'opened']);


        return back();

    }



    public function closeexam( $studentid, $examid)
    {


        $student =  User::findOrFail($studentid);

        $student->exams()->updateExistingPivot($examid,['status'=> 'closed']);


        return back();


    }




}
