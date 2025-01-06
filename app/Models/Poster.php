<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Poster extends Model
{
    /**
     * Get all of the poster's forms.
     */
    public function forms(): MorphMany
    {
        return $this->morphMany(Form::class, 'formable');
    }
}
