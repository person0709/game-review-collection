<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id', 'game_id', 'game_slug', 'game_name',
    ];
}
