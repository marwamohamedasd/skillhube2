<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;
use App\Models\Exam;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class examcontroller extends Controller
{
    public  function show($id)
    {
        $data['exam'] = Exam::FindOrFail($id);
          $user =Auth::user();

        $data['canviewstartbtn'] = true;

        if($user !== null)
          {
              $pivotRow = $user->exams()->where('exam_id',$id)->first();

              if($pivotRow !==null and $pivotRow->pivot->status == 'closed')
              {
                  $data['canviewstartbtn'] = false;

              }
          }

        return view('web.exams.show')->with($data);

    }



    public function start($examid , Request $request)
    {
      //   $userId=Auth::user()->id;
          $user=Auth::user();

          if(! $user->exams->contains($examid)) {
              //هنا بجيب صف كل يوزر
              $user->exams()->attach($examid);
              /*
               * معناها انت لو معاك userid حتحطلك  examidوالعكس
               *
               * */
          }
          else{
              $user->exams()->updateExistingPivot($examid,['status' =>'closed',
                  ]);

          }
        $request->session()->flash('prevpage',"start/$examid");
       return redirect(url("exams/question/$examid"));

    }


    public  function question($examid ,Request $request)

    {
        if(session('prevpage') !== "start/$examid")
        {

            return  redirect(url("exams/show/$examid"));
        }
        $data['exam'] = Exam::FindOrFail($examid);
        $request->session()->flash('prevpage',"questions/$examid");

        return view('web.exams.questions')->with($data);

    }



    public  function submit($examid , Request $request)

    {
        if(session('prevpage') !== "questions/$examid")
        {

            return  redirect(url("exams/show/$examid"));
        }


       $request->validate([

        'answers' =>'required|array',
           'answers.*' =>'required|in:1,2,3,4'   /*   كل value من answerلازم تكون required و      integer*/


       ]);
// caculate score

       // $score=0;
        /* حنقارن الايجاباات اللي في الداتا بيز بالايجابات  اللي هوة مدخلها في الفورم*/
          $exam =  Exam::findOrFail($examid);
          $points = 0;
          $totalquestionnum =$exam->question->count();
          foreach ($exam->question as $quset) {
              if (isset($request->answers[$quset->id])) {
                  $useranswer = $request->answers[$quset->id];
                  $rightanswer = $quset->right_answer;

                  if ($useranswer == $rightanswer)

                      $points += 1;

              }
          }

        $score = ($points / $totalquestionnum) *100;

       // dd($score);

             // dd($request->all());

        // calculate time  mins
        $user = Auth::user();
        $pivotrow= $user->exams()->where('exam_id',$examid)->first();
        $starttime =$pivotrow->pivot->created_at;
        $submitetime = Carbon::now();

        $timesmins = $submitetime->diffInMinutes($starttime);
        //dd($starttime);
  if($timesmins >$pivotrow->duration_mins)
  {
      $score=0;
  }
        //update pivot row
        $user->exams()->updateExistingPivot($examid ,[
      'scope'=>$score,
     'times_min'=>$timesmins,

        ]);
  $request->session()->flash("sucess","you finshed exam suceefuly with score $score%");
        return redirect(url("exams/show/$examid"));
    }
}
