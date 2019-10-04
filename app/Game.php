<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    protected $primaryKey = ['name','platform'];
    public $incrementing = false;

    protected $casts = [
        'genres' => 'array'
    ];

    public function wishlist(){
        return $this->belongsTo(Wishlist::class);
    }
}
