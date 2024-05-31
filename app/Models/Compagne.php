<?php

namespace App\Models;

use App\Models\Lead;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Compagne extends Model
{

    use HasFactory, Notifiable;

    protected $table = 'compagnes';

    protected $fillable = [
        'title',
        'slogan',
        'text_compagne',
        'leads',
        'image',
        'date_limite',
        'user_id'

    ];
  // Définir la relation hasMany vers le modèle Lead
//   public function leads()
//   {
//       return $this->hasMany(Lead::class);
//   }

  public function leads()
  {
      return $this->belongsToMany(Lead::class, 'compagne_lead');
  }

  public function user()
  {
      return $this->belongsTo(User::class);
  }


}
