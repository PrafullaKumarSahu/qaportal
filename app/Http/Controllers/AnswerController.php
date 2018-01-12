<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Exam;
use App\Question;
use App\Answer;
use App\UserQuestionAnswer;

class AnswerController extends Controller
{
    public function store($exam_id, $question_id)
    {

         //validate
        //validate
    	//Retrive all data
    	// update user_question_answer_table
    	UserQuestionAnswer::create([
    		'user_id' => Auth::id(),
    		'exam_id' => $exam_id,
    		'question_id' => $question_id,
    		'answer_id' => request('answer')
    	]);
    	
    	// var_dump($exam_id);
    	// var_dump($question_id);
    	// var_dump(Auth::id());
    	// dd(request(['answer']));

    	//Update 
    	//redirect
    	return redirect()->back();
    }
}
