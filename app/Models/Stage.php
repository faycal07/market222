<?php



namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'nom',
        'sort',
        'probabilite',
        'is_user_defined',
    ];


    public function opportunites()
    {
        return $this->belongsToMany(Opportunite::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }
}


