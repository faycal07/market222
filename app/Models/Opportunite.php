<?php

namespace App\Models;

use App\Models\Lead;
use App\Models\User;
use App\Models\Stage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Opportunite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'is_default',
        'user_id',

    ];

    /**
     * Obtenez les stages associés à cette opportunité.
     */
    public function stages()
    {
        return $this->belongsToMany(Stage::class, 'opportunite_stage');
    }
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}

