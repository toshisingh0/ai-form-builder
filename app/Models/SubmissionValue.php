<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubmissionValue extends Model
{
   protected $fillable = [
    'submission_id',
    'field_key',
    'value'
   ];

   public function submission()
   {
       return $this->belongsTo(FormSubmission::class);
   }
}
