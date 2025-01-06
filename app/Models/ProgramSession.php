<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class ProgramSession extends Model
{

    /**
     * Get all of the session's forms.
     */
    public function forms(): MorphMany
    {
        return $this->morphMany(Form::class, 'formable');
    }
}
