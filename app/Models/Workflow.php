<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Workflow extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'event',
        'actions',
        'status',
        'priority',
        'conditions',
    ];

    protected $casts = [
        'conditions' => 'array',
    ];
}
