<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Exam;

class ExamController extends Controller
{
    public function __construct()
	{
		$this->middleware('auth')->except(['index', 'show']);
	}

    public function create(){
    	return view('exams.create');
    }

    public function index(){
    	$exams = Exam::all();
    	return view('exams.index')->with('exams', $exams);
        //return $exams;
    }

    public function show(Exam $exam){
    	return view('exams.show', compact('exam'));
    }

    public function store(){
    	$this->validate(request(), [
    		'title' => 'required|min:3|max:20',
    		'description' => 'required|max:250'
    	]);
    	
    	Exam::create([
    		'title' => request('title'),
    		'description' => request('description'),
    		'question_counts' => request('question_count'),
    		'time' => request('time'),
    	]);

    	return redirect('/exams');
    }
}
