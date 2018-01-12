<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Exam;
use App\Question;

class QuestionController extends Controller
{
	public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

    public function index($exam_id)
    {
        if (Auth::check()) {
        
            if( request()->user()->hasRole('admin') ){
                $questions = Question::all();
                $questions = Question::paginate(5);
                return view('questions.index')->with(['questions' => $questions, 'exam_id' => $exam_id]);    
            } else {
                $questions = request()->session()->get('questions');
                if ( empty($questions) ){
                   $questions = Question::all()->random(20);
                   request()->session()->put('questions', $questions);
                }
                return view('students/questions/index')->with(['questions' => $questions, 'exam_id' => $exam_id]); 
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
        //dd(request());
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
            
            //flag is not getting updated
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
        if ( request()->user()->hasRole('admin') ){
    	    return view('questions.show', compact(['question', 'exam', 'options']))->with('previous', $previous)->with('next', $next);;
        } else {
            return view('students/questions.show', compact(['question', 'exam', 'options']))->with('previous', $previous)->with('next', $next);;    
        }

        
    }

    public function edit(Question $question){
        request()->user()->hasRole('admin');
    	//
    }
    public function update(Question $question){
        request()->user()->hasRole('admin');
    	//
    }
}
