<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opportunite extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'is_default',

    ];

    /**
     * Obtenez les stages associés à cette opportunité.
     */
    public function stages()
    {
        return $this->belongsToMany(Stage::class);
    }
    public function leads()
    {
        return $this->hasMany(Lead::class);
    }

}

