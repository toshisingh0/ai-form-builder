<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FormSubmission extends Model
{
    protected $fillable = [
    'form_id'
    ];

    public function values()
    {
        return $this->hasMany(SubmissionValue::class,'submission_id');
    }
}
