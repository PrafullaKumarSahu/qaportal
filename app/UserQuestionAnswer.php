<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuestionAnswer extends Model
{
    protected $fillable = ['description', 'user_id', 'exam_id', 'question_id', 'answer_id'];
}