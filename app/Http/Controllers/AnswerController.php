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

        //Check if already attained
        //if yes update
        // $userQuestionAnswer = new UserQuestionAnswer();
        // $userQuestionAnswer->user_id = Auth::id();
        // $userQuestionAnswer->exam_id = $exam_id;
        // $userQuestionAnswer->question_id = $question_id;
        // $userQuestionAnswer->answer_id = request('answer');
        // $userQuestionAnswer->save();
        
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
