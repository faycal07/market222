<?php

namespace App\Models;

use App\Models\User;
use App\Models\Template;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Email extends Model
{
    use HasFactory,Notifiable;

    protected $fillable = [
        'from',
        'to',
        'subject',
        'body',
        'attachments',
        'template_id',
        'user_id',
    ];

    /**
     * Cast attachments attribute to JSON for storing serialized data.
     *
     * @var array
     */
    protected $casts = [
        'attachments' => 'json',
    ];

    public function template()
    {
        return $this->belongsTo(Template::class);
    }

    public function user()
  {
      return $this->belongsTo(User::class);
  }
}
