<?php

namespace App\Models;
use App\Models\FormSubmission;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Form extends Model
{
    protected $fillable = [
        'title',
        'schema',
    ];

   protected $casts = [
    'schema' => 'array',
   ];

    public function fields()
    {
        return $this->hasMany(FormField::class, 'form_id');
    }


    public function submissions()
    {
        return $this->hasMany(FormSubmission::class, 'form_id');
    }
}