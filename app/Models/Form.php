<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Form extends Model
{
    protected $fillable = [
        'name',
        'user_id',
        'formable_id',
        'formable_type',
    ];

    /**
     * Get the parent formable model (session or poster).
     */
    public function formable(): MorphTo
    {
        return $this->morphTo();
    }

    public function questions()
    {
        return $this->belongsToMany(Question::class, 'form_has_questions', 'form_id', 'question_id')->withPivot('answer');
    }
}
