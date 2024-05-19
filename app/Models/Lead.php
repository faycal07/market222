<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    protected $fillable = [
        'nom',
        'email',
        'tel',
        'types_id',
        'sources_id',
        'opportunite_id',
        'produit_id',
        'stage_id',
    ];
    public function products()
    {
        return $this->belongsToMany(Product::class, 'lead_products', 'lead_id', 'product_id');
    }


    public function type()
    {
        return $this->belongsTo(LeadType::class, 'types_id');
    }

    public function source()
    {
        return $this->belongsTo(LeadSource::class, 'sources_id');
    }

    public function opportunite()
    {
        return $this->belongsTo(Opportunite::class, 'opportunite_id');
    }

    public function stage()
    {
        return $this->belongsTo(Stage::class, 'stage_id');
    }

    public function compagnes()
    {
        return $this->belongsToMany(Compagne::class, 'compagne_lead');
    }



}
