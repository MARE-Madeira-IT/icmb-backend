<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Form extends Model
{

    /**
     * Get the parent formable model (session or poster).
     */
    public function formable(): MorphTo
    {
        return $this->morphTo();
    }
}
