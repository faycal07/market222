<?php

namespace App\Models;

use App\Models\User;
use App\Models\Stage;
use App\Models\Product;
use App\Models\Compagne;
use App\Models\LeadType;
use App\Models\LeadSource;
use App\Models\Opportunite;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
        'user_id',
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
    public function user()
    {
        return $this->belongsTo(User::class);
    }


}
