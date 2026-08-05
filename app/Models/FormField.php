<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FormField extends Model
{
    protected $fillable = [
        'form_id',
        'type',
        'label',
        'key',
        'placeholder',
        'required',
        'options',
        'validation',
        'position',
    ];

    protected $casts = [
        'options' => 'array',
        'validation' => 'array',
        'required' => 'boolean',
    ];

    public function form(): BelongsTo
    {
        return $this->belongsTo(Form::class);
    }
}