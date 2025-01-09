<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $fillable = [
        'content',
        'type',
    ];

    public function forms()
    {
        return $this->belongsToMany(Form::class, 'form_has_questions', 'question_id', 'form_id')->withPivot('answer');
    }
}
