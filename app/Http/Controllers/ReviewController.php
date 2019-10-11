<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        return view('review')->with('user', $user);
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
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(User $user, $gameId)
    {
        $attributes = request()->validate(
            [
            'game_name' => 'required',
            'game_slug' => 'required',
            'rating'    => 'required',
            'pros'      => 'nullable',
            'cons'      => 'nullable',
            ]
        );

        $result = $user->addReview($gameId, $attributes);

        if ($result) {
            request()->session()->flash('message', 'Review saved!');
        } else {
            request()->session()->flash('status', 'Failed!');
        }

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, $id)
    {
        $result = $user->reviews()->where('game_id', $id)->delete();

        if ($result) {
            request()->session()->flash('message', 'Review deleted!');
        } else {
            request()->session()->flash('status', 'Failed!');
        }

        return back();
    }
}
