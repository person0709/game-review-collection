<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    public function user(){
        return $this->belongsTo(User::class);
    }

    public function games(){
        return $this->hasMany(Game::class);
    }
}
