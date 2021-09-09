<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\Homecontroller;
use App\Http\Controllers\web\catcontroller;
use App\Http\Controllers\web\skillcontroller;
use App\Http\Controllers\web\examcontroller;
use App\Http\Controllers\web\Langcontroller;
use App\Http\Controllers\Admin\Homecontroller as AdminHomecontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('lang')->group(function(){




    Route::get('/',[Homecontroller::class,'index']);

    Route::get('/categories/show/{id}',[catcontroller::class,'show']);
    Route::get('/skills/show/{id}',[skillcontroller::class,'show']);

    Route::get('/exams/show/{id}',[examcontroller::class,'show']);
    Route::get('/exams/question/{id}',[examcontroller::class,'question'])->middleware(['auth','verified','isstudent']);

    Route::get('/contact',[\App\Http\Controllers\web\contactcontroller::class,'index']);

    Route::get('/profile',[\App\Http\Controllers\web\Profilecontrol::class,'index'])->middleware(['auth','verified','isstudent']);



    //Route::get('/contact',[\App\Http\Controllers\web\contactcontroller::class,'index'])->middleware('verified');



});




Route::post   ('/exams/start/{id}',[examcontroller::class,'start'])->middleware(['auth','verified','isstudent','Can-enter-exam']); //دة بتاع  بداية الامتحان
Route::post ('/exams/submit/{id}',[examcontroller::class,'submit'])->middleware(['auth','verified','isstudent']);// دة بتاع  تسليم الامتحان


Route::post('/contact/message/send',[\App\Http\Controllers\web\contactcontroller::class,'send']);

Route:: get('/lang/set/{lang}',[Langcontroller::class ,'set']);

Route::prefix('dashboard')->middleware(['auth','verified' ,'Can-enter-dashboard'])->group(function(){

    Route::get('/' ,[AdminHomecontroller::class , 'index']);

    Route::get('/categories' ,[\App\Http\Controllers\Admin\Catcontrolleradmin::class ,'index']);

    Route::post('/categories/store',[\App\Http\Controllers\Admin\Catcontrolleradmin::class ,'store']);
    Route::post('/categories/update',[\App\Http\Controllers\Admin\Catcontrolleradmin::class ,'update']);

    Route::get ('/categories/toggle/{cat}',[\App\Http\Controllers\Admin\Catcontrolleradmin::class ,'toggle']);

    Route::get('/categories/delete/{cat}',[\App\Http\Controllers\Admin\Catcontrolleradmin::class ,'delete']);



    Route::get('/skills' ,[\App\Http\Controllers\Admin\Skillcontrolleradmin::class ,'index']);

    Route::post('/skills/store',[\App\Http\Controllers\Admin\Skillcontrolleradmin::class ,'store']);
    Route::post('/skills/update',[\App\Http\Controllers\Admin\Skillcontrolleradmin::class ,'update']);

    Route::get ('/skills/toggle/{skill}',[\App\Http\Controllers\Admin\Skillcontrolleradmin::class ,'toggle']);



    Route::get('/skills/delete/{skill}',[\App\Http\Controllers\Admin\Skillcontrolleradmin::class ,'delete']);



    Route::get('/exams' ,[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'index']);

    Route::get('/exams/show/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'show']);
    //Route::get('/exams/show/{exam}/questions',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'showquestion']);
    Route::get('/exams/show-questions/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'showquestion']);


    Route::get('/exams/create',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'create']);
    Route::get('/exams/create-questions/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'createquestions']);
    Route::post('/exams/store-questions/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'storequestions']);



    Route::post('/exams/store',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'store']);
    Route::get('/exams/edit/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'edit']);

    Route::post('/exams/update/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'update']);

    Route::get('/exams/edit-questions/{exam}/{question}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'editquestions']);
    Route::post('/exams/update-questions/{exam}/{question}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'updatequestions']);





    Route::get ('/exams/toggle/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'toggle']);

    Route::get('/exams/delete/{exam}',[\App\Http\Controllers\Admin\examcontrolleradmin::class ,'delete']);

    Route::get('/students',[\App\Http\Controllers\Studentcontroller::class ,'index']);
    Route::get('/students/show-score/{id}',[\App\Http\Controllers\Studentcontroller::class ,'showscore']);
    Route::get('/students/open-exam/{studentid}/{examid}',[\App\Http\Controllers\Studentcontroller::class ,'openexam']);
    Route::get('/students/close-exam/{studentid}/{examid}',[\App\Http\Controllers\Studentcontroller::class ,'closeexam']);


    Route::middleware('issuperadmin')->group(function(){



        Route::get('/admins',[\App\Http\Controllers\Admincontroller::class,'index']);

        Route::get('/admins/create',[\App\Http\Controllers\Admincontroller::class,'create']);

        Route::post('admins/store', [\App\Http\Controllers\Admincontroller::class,'store']);

        Route::get('admins/promote/{id}', [\App\Http\Controllers\Admincontroller::class,'promote']);
        Route::get('admins/demote/{id}' , [\App\Http\Controllers\Admincontroller::class,'demote']);


    });


    Route::get('messages', [\App\Http\Controllers\messagecontroller::class,'index']);
    Route::get('messages/show/{message}', [\App\Http\Controllers\messagecontroller::class,'show']);
    Route::post('messages/response/{message}', [\App\Http\Controllers\messagecontroller::class,'response']);





});





