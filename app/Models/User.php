<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Lead;
use App\Models\Email;
use App\Models\Compagne;
use App\Models\Template;
use App\Models\Workflow;
use App\Models\Opportunite;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // Ajoutez 'name' à la liste des attributs fillable
        'email',
        'password',
        'role',
        'archiver',
        'avatar',
        'photo',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function compagnes()
    {
        return $this->hasMany(Compagne::class);
    }

    public function opportunites()
    {
        return $this->hasMany(Opportunite::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }

    public function templates()
    {
        return $this->hasMany(Template::class);
    }

    public function leads()
    {
        return $this->hasMany(Lead::class);
    }


    public function workflows()
    {
        return $this->hasMany(Workflow::class);
    }
}
