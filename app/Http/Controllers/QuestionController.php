<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


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
    	$questions = Question::all();
    	return view('questions.index')->with(['questions' => $questions, 'exam_id' => $exam_id]);
    }

    public function create($exam_id){
    	return view('questions.create')->with('exam_id', $exam_id);
    }

    public function store($exam_id){
    	$this->validate(request(), [
    		'description' => 'required|min:10|max:500',
    	]);
    	
    	Question::create([
    		'description' => request('description'),
    		'exam_id' => $exam_id
    	]);

    	return redirect('/exams/' . $exam_id . '/questions');
    }
}
