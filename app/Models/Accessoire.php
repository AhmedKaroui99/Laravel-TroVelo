<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Accessoire extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomAccessoire',
        'prix',
        'location_id',
        'image',
    ];

    protected $casts = [
        'location_id' => 'integer',
        'prix' => 'float',
        'nomAccessoire' => 'string',
        'image' => 'string',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id', 'id');
    }

   

    
}