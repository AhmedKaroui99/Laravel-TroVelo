<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trotinette extends Model
{
   use HasFactory;
    protected $fillable = ['nom', 'categorie_id', 'vitesse','poids', 'couleur', 'prix', 'prix_location', 'quantite', 'image'];
    // public function CategorieTrotinette(){
    //     return $this->belongsTo(CategorieTrotinette::class);
    // }

    // one to many relation with location
    public function locations()
    {
        return $this->hasMany(Location::class);
    }
 
    public function categoryT(){
        return $this->belongsTo(CategorieT::class,'categorie_id','id');
    }
}