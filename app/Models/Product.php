<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom',
        'sku',
        'description',
        'quantite',
        'prix'
    ];
    public function leads()
    {
        return $this->belongsToMany(Lead::class, 'lead_products');
    }
}
