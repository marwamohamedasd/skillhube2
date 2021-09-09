<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use App\Models\questions;
use App\Models\Skill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class examcontrolleradmin extends Controller
{


    public  function index()
    {

        $data['exams'] = Exam::select('id','name','skill_id','img','qestion_no','active')->orderBy('id' ,'DESC')->paginate(5);

      //  $data['cats'] = Cat::select('id' ,'name')->get();

        return view('admin.exams.index')->with($data);
    }



    public  function show(Exam $exam)
    {

        $data['exam'] = $exam;

        //  $data['cats'] = Cat::select('id' ,'name')->get();

        return view('admin.exams.show')->with($data);
    }

    public  function showquestion(Exam $exam)
    {

        $data['exam'] = $exam;

        //$data['questions'] = $exam->question;

        //  $data['cats'] = Cat::select('id' ,'name')->get();

        return view('admin.exams.show-questions')->with($data);
    }


    public  function create(Exam $exam)
    {
   $data['skills'] = Skill::select('id','name')->get();

        return view('admin.exams.create')->with($data);
    }


    public function store( Request $request)
    {

        $request->validate([

            'name_en'=>'required|string|max:50',
            'name_ar'=>'required|string|max:50',
            'desc_en'=>'required|string|max:5000',

            'desc_ar'=>'required|string|max:5000',
            'img'=>'required|image|max:2048',

            'skill_id' => 'required|exists:skills,id',
            'qestion_no'=>'required|integer|min:1',
            'diffculty'=>'required|integer|min:1|max:5',
            'duration_mins'=>'required|integer|min:1',
        ]);

        $path =Storage::putFile("skills",$request->file('img'));

        $exam = Exam::create([


            'name'=> json_encode([
                'en'=>$request->name_en,
                'ar'=>$request->name_ar,


            ]),


            'desc'=> json_encode([
                'en'=>$request->desc_en,
                'ar'=>$request->desc_ar,


            ]),

            'img'=>$path,

            'skill_id'=> $request->skill_id,
            'qestion_no'=>$request->qestion_no,
            'diffculty'=>$request->diffculty,
            'duration_mins'=>$request->duration_mins,
            'active'=>0,


        ]);

        $request->session()->flash('prev',"exam/$exam->id");
        return redirect(url("dashboard/exams/create-questions/{$exam->id}"));

    }

    public  function createquestions(Exam $exam ,Request $request)
    {

        if(session('prev') !== "exam/$exam->id" or session('current') !=="exam/$exam->id")
        {
            return redirect (url('dashboard/exams'));
        }

   $data['exam_id'] = $exam->id;
   $data['questions_no'] = $exam->qestion_no;

   return view('admin.exams.create-questions')->with($data);

    }


public  function storequestions(Exam $exam ,Request $request)
{

    $request->session()->flash('current',"exam/$exam->id");

$request->validate([

    'titles'=>'required|array',
    'titles.*'=>'required|string',

    'right_answer'=>'required|array',
    'right_answer.*'=>'required|in:1,2,3,4',

    'option_1s'=>'required|array',
    'option_1s.*'=>'required|string',

    'option_2s'=>'required|array',
    'option_2s.*'=>'required|string',

    'option_3s'=>'required|array',
    'option_3s.*'=>'required|string',

    'option_4s'=>'required|array',
    'option_4.*s'=>'required|string',


]);

for ($i=0 ; $i< $exam->qestion_no ; $i++)

{

    questions::create([

'exam_id'=> $exam->id,
'title'=> $request->titles[$i],
'right_answer'=> $request->right_answer[$i],
'option_1'=> $request->option_1s[$i],
'option_2'=> $request->option_2s[$i],
'option_3'=> $request->option_3s[$i],
'option_4'=> $request->option_4s[$i],




    ]);

}

$exam->update([

    'active' =>1,
]);


return redirect(url("dashboard/exams"));
}



public  function edit(Exam $exam)

{
$data['skills'] = Skill::select('id','name')->get();
$data['exam']= $exam;

return view('admin.exams.edite')->with($data);


}



public  function update(Exam $exam ,Request $request)
{


    $request->validate([

        'name_en'=>'required|string|max:50',
        'name_ar'=>'required|string|max:50',
        'desc_en'=>'required|string|max:5000',

        'desc_ar'=>'required|string|max:5000',
        'img'=>'nullable|image|max:2048',

        'skill_id' => 'required|exists:skills,id',
        'diffculty'=>'required|integer|min:1|max:5',
        'duration_mins'=>'required|integer|min:1',
    ]);

    $path =$exam->img;

    if($request->hasFile('img'))
    {
        Storage::delete($path);
        $path =Storage::putFile("exams",$request->file('img'));
    }

    $exam->update([


        'name'=> json_encode([
            'en'=>$request->name_en,
            'ar'=>$request->name_ar,


        ]),


        'desc'=> json_encode([
            'en'=>$request->desc_en,
            'ar'=>$request->desc_ar,


        ]),

        'img'=>$path,

        'skill_id'=> $request->skill_id,
        'diffculty'=>$request->diffculty,
        'duration_mins'=>$request->duration_mins,

    ]);

    $request->session()->flash('msg' ,'row updated sucessfly');

return redirect(url("dashboard/exams/show/$exam->id"));

}



public  function editquestions(Exam $exam ,questions $question)

{
  $data['exam']= $exam;

    $data['ques']= $question;

    return view('admin.exams.edit-question')->with($data);

}

public  function  updatequestions(Exam $exam ,questions $question ,Request $request)

{

   $data = $request->validate([

        'title'=>'required|string|max:500',

        'right_answer'=>'required|in:1,2,3,4',

        'option_1'=>'required|string|max:255',

        'option_2'=>'required|string|max:255',

        'option_3'=>'required|string|max:255',

        'option_4'=>'required|string:max:255',


    ]);

    $question->update($data);
    return redirect(url("dashboard/exams/show-questions/$exam->id"));


}



    public  function  toggle(Exam $exam)
    {
        if($exam->qestion_no == $exam->question()->count()) {
            $exam->update([
                'active' => !$exam->active

            ]);
        }
        return back();
    }


public  function  delete(Exam $exam ,Request $request)

{

    try {

        $path = $exam->img;

        $exam->delete();
        $exam->question()->delete();
        Storage::delete($path);
        $msg= "row deleted sucessfuly" ;
    }
    catch (\Exception $exception)
    {
        $msg = " canot deleted row";

    }

    $request->session()->flash('msg',$msg);

    return back();





}


































}
