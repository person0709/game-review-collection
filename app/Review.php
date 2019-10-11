<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'user_id', 'game_id', 'game_slug', 'game_name', 'rating', 'pros', 'cons',
    ];
}
