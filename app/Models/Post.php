<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RyanChandler\Comments\Concerns\HasComments;

class Post extends Model
{
    use HasFactory;
    use HasComments;

      /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'content',
        'categorya_id',
        'img'
    ];
    public function categorya(){
        return $this->belongsTo(CategoryA::class ,'categorya_id', 'id');
    }

}
