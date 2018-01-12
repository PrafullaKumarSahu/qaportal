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
        if (!request()->user()->authorizeRoles(['admin'])){
            //Todo
            //Add flash message here and displa in view
            return redirect('/exams');
        }
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
        if (!request()->user()->authorizeRoles(['admin'])){
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
    		'question_counts' => request('question_count'),
    		'time' => request('time'),
    	]);

    	return redirect('/exams');
    }
}
