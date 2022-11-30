<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'velo_id',
        'trotinette_id',
        'accessoire_id',
        'idClient',
        'emailClient',
        'idStation',
        'dateDebut',
        'dateFin',
        'prix',
        'statutPaiement',
        'statutLocation',
        'remarque',
        'idAgent',
    ];



    public function velo()
    {
        return $this->belongsTo(Velo::class, 'velo_id', 'id');
    }

    public function trotinette()
    {
        return $this->belongsTo(Trotinette::class, 'trotinette_id', 'id');
    }    

    public function accessoires()
    {
        return $this->hasMany(Accessoire::class);
    }
}