<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function wishlists()
    {
        return $this->hasMany(Wishlist::class);
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function addWishlist($id, $game)
    {
        return !empty($this->wishlists()->create([
            'game_id'   => $id,
            'game_slug' => $game['game_slug'],
            'game_name' => $game['game_name'],
        ]));
        // return $this->wishlist()->create(compact($game));
    }

    public function addReview($id, $game)
    {
        return !empty($this->reviews()->create([
            'game_id'   => $id,
            'game_slug' => $game['game_slug'],
            'game_name' => $game['game_name'],
            'rating' => $game['rating'],
            'pros' => $game['pros'],
            'cons' => $game['cons'],
        ]));
    }

    public function isInWishlist($gameId)
    {
        return $this->wishlists()->where('game_id', $gameId)->exists();
    }

    public function getReview($gameId)
    {
        return $this->reviews()->where('game_id', $gameId)->first();
    }
}
