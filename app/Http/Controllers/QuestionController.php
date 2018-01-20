<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use DB;
use App\Exam;
use App\Question;
use App\Answer;
use App\UserExam;

class QuestionController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

    //Todo
    //Use model view bind here
    public function index(Exam $exam)
    {
        // $exam = Exam::find($exam_id);

        if (Auth::check()) {
        
            if( request()->user()->hasRole('admin') ){
               // $questions = Question::all();
                $questions = $exam->questions()->get();
                $questions = Question::paginate(5);
                return view('questions.index')->with(['questions' => $questions, 'exam' => $exam]);    
            } else {
                //Todo
                //Use cache o store the questions and answers here
                //Check if questions and answers are on cache use those
                //or retrieve from database and store in cache

                $questions = request()->session()->get('questions');
                if ( empty($questions) ){
                   // $questions = Question::all()->random(20);
                   $questions = $exam->questions()->get()->random(20);
                   request()->session()->put('questions', $questions);
                }
                return view('students/questions/index')->with(['questions' => $questions, 'exam' => $exam]); 
            }
        }
        
    }

    public function create($exam_id){
        if( !request()->user()->hasRole('admin')){
            return redirect('/exams');
        }
    	return view('questions.create')->with('exam_id', $exam_id);
    }

    public function store($exam_id){
        if ( !request()->user()->hasRole('admin') ){
            //Todo
            //Add flash message here
            //and display in view
            return redirect('/exams');
        }

    	$this->validate(request(), [
    		'description' => 'required|min:10|max:500',
    	]);
    	
    	$question = Question::create([
    		'description' => request('description'),
    		'exam_id' => $exam_id
    	]);

        $options = request(['option_1', 'option_2', 'option_3', 'option_4']);

        foreach ($options as $key => $option) {
            $flag = 0;

            if ($key == request('answer')){
                $flag = 1;
            }
            
            $question->answers()->createMany([
                [
                    'description' => $option,
                    'flag' => $flag
                ]
            ]);
        }

    	return redirect('/exams/' . $exam_id . '/questions');
    }

    public function show($exam_id, $question_id){

    	$exam = Exam::find($exam_id);
    	$question = Question::find($question_id);

    	// get previous question id
	    $previous = Question::where('id', '<', $question->id)->max('id');

	    // get next question id
	    $next = Question::where('id', '>', $question->id)->min('id');

        $options = $question->answers()->get();
    
        $user_answer = DB::table('user_question_answers')->where([
                    ['exam_id', '=', $exam_id],
                    ['question_id', '=', $question_id]
                ])->pluck('answer_id');

        $user_answer = count($user_answer) ? $user_answer[0] : 0;    
        
        if ( request()->user()->hasRole('admin') ){
    	    return view('questions.show', compact(['question', 'exam', 'options']))->with('previous', $previous)->with('next', $next);;
        } else {
            return view('students/questions.show', compact(['question', 'exam', 'options', 'user_answer']))->with('previous', $previous)->with('next', $next);    
        }
    }

    //public function edit(Exam $exam, Question $question){
    public function edit($exam_id, $question_id){
        $exam = Exam::find($exam_id);
        $question = Question::find($question_id);
        $options = $question->answers()->get();

        // // get previous question id
        // $previous = Question::where('id', '<', $question->id)->max('id');

        // // get next question id
        // $next = Question::where('id', '>', $question->id)->min('id');

        if ( request()->user()->hasRole('admin') ){
            // return view('questions.edit', compact(['exam', 'question', 'options']))->with('previous', $previous)->with('next', $next);
            return view('questions.edit', compact(['exam', 'question', 'options']));
        } else {
            return redirect('/login');
        }
    }
    
    public function update($exam_id, $question_id){
        if ( request()->user()->hasRole('admin') ){
            $question = Question::find($question_id);
            $question->description = request('description');
            $question->save();
            $answers = $question->answers()->get();
           
            if ( count($answers) != 0 ){
                $option_ids = $answers->pluck('id');
                foreach ($option_ids as $option_id) {
                    $key = 'option_' . $option_id;
                    $options[$option_id] = request("$key");
                }

                foreach ($options as $key => $option) {
                    $answer = Answer::find($key);
                    $answer->description = $option;
                    $flag = 0;
                    if ($key == request('answer')){
                        $flag = 1;
                    }
                    $answer->flag = $flag;
                    $answer->save();
                }
            } else {
                $options = request(['option_1', 'option_2', 'option_3', 'option_4']);
                
                foreach ($options as $key => $option) {
                    $flag = 0;

                    if ($key == request('answer')){
                        $flag = 1;
                    }
                    
                    $question->answers()->createMany([
                        [
                            'description' => $option,
                            'flag' => $flag
                        ]
                    ]);
                }
            }
            
            return redirect()->back();

        } else {
            return redirect('/login');
        }
    }
}
