<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'image',
    ];

    protected $casts = [
        'date' => 'date',
    ];
}