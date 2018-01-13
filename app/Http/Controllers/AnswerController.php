<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Exam;
use App\Question;
use App\Answer;
use App\UserQuestionAnswer;

class AnswerController extends Controller
{
    public function store($exam_id, $question_id)
    {
        //Todo
        //Could be enhanced

        $answer = DB::table('user_question_answers')->where(
            [
                ['exam_id', '=', $exam_id],
                ['question_id', '=', $question_id]
            ]
        )->get()->last();

        if ( count($answer) ){
            $updated = DB::table('user_question_answers')
                ->where(
                [
                    ['exam_id', '=', $exam_id],
                    ['question_id', '=', $question_id]
                ]
            )->update(['answer_id' => request('answer')]);
        } else {
            $userQuestionAnswer = new UserQuestionAnswer();
            $userQuestionAnswer->user_id = Auth::id();
            $userQuestionAnswer->exam_id = $exam_id;
            $userQuestionAnswer->question_id = $question_id;
            $userQuestionAnswer->answer_id = request('answer');
            $userQuestionAnswer->save();
        }
        
    	return redirect()->back();
    }
}
