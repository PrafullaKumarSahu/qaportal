<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Exam;
use App\UserExam;

class ExamController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

    public function create(){
        if (!request()->user()->hasRole('admin')){
            //Todo
            //Add flash message here and displa in view
            return redirect('/exams');
        }
    	return view('exams.create');
    }

    public function index(){
    	$exams = Exam::all();
        if (request()->user()->hasRole('admin')){
        	return view('exams.index')->with('exams', $exams);
        } else {
            return view('students/exams/index')->with('exams', $exams);
        }
        //return $exams;
    }

    public function show(Exam $exam)
    {
        //Todo
        //Use cache to store the questions and answers here
        //Check if questions and answers are on cache use those
        //or retrieve from database and store in cache

        if ( !UserExam::where([
            'user_id' => Auth::id(),
            'exam_id' => $exam->id
        ])->count()){
            $userExam = new UserExam();
            $userExam->user_id = Auth::id();
            $userExam->exam_id = $exam->id;
            $userExam->status = 'InProgress';
            $userExam->save();
        }
        
        $questions = request()->session()->get('questions');
        if ( empty($questions) ){
           $questions = $exam->questions()->get()->random(20);
           request()->session()->put('questions', $questions);
        }
    	return view('students/exams.show', compact(['exam', 'questions']));
    }

    public function store(){
        if (!request()->user()->hasRole('admin')){
            //Todo
            //Add flash message here and displa in view
            return redirect('/exams');
        }

    	$this->validate(request(), [
    		'title' => 'required|min:3|max:20',
    		'description' => 'required|max:250'
    	]);
    	
    	Exam::create([
    		'title' => request('title'),
    		'description' => request('description'),
    		'question_counts' => request('question_count') ? request('question_count') : 20,
    		'time' => request('time') ? request('time') : 20,
            'status' => false
    	]);

    	return redirect('/exams');
    }

    public function edit(Exam $exam)
    {
        return view('exams.edit', compact('exam'));
    }

    public function update(Exam $exam)
    {
        if (!request()->user()->hasRole('admin')){
            //Todo
            //Add flash message here and displa in view
            return redirect('/exams');
        }
        $exam->title = request('title');
        $exam->description = request('description');
        $exam->question_counts = request('question_count') == null ? $exam->question_counts : request('question_count');
        $exam->time = request('time');
        $exam->save();
        return redirect()->back();
    }
}
