<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
	protected $fillable = ['title', 'description', 'question_counts'];

    public function questions()
    {
    	return $this->hasMany(Question::class);
    }
}
