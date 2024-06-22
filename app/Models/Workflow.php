<?php

namespace App\Models;

use App\Models\User;
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
        'user_id',

    ];

    protected $casts = [
        'conditions' => 'array',
    ];


    public function user()
  {
      return $this->belongsTo(User::class);
  }
}
