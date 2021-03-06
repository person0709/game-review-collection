<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('wishlist')->with('user', $user);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(User $user, $id)
    {
        $attributes = request()->validate(
            [
            'game_name' => 'required',
            'game_slug' => 'required',
            ]
        );

        $result = $user->addWishlist($id, $attributes);

        if ($result) {
            request()->session()->flash('message', 'Added to wishlist!');
        } else {
            request()->session()->flash('status', 'Failed!');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $result = $user->wishlists()->where('game_id', $id)->delete();

        if ($result) {
            request()->session()->flash('message', 'Removed from wishlist');
        } else {
            request()->session()->flash('status', 'Failed!');
        }

        return back();
    }
}
