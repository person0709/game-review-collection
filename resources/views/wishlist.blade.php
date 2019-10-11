@extends('layouts.app')

@section('content')

<div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                @php
                    $games = $user->wishlists()->get();
                @endphp
                @if (count($games))
                <h1 class="mb-4">Wishlist</h1>

                @foreach ($games as $game)
                <div class="card mb-1">
                    <div class="card-body pb-3 pt-3">
                        <a href="/search/{{$game->game_slug}}">
                            <h5 class="card-title">{{$game->game_name}} <a href="/users/{{ Auth::id() }}/wishlist/{{ $game->game_id}}" class="btn btn-danger float-right"
                            onclick="event.preventDefault(); document.getElementById('wishlist-delete-{{$game->game_id}}').submit();">Delete</a> </h5>

                            <form id="wishlist-delete-{{$game->game_id}}" method="POST" action="/users/{{ Auth::id() }}/wishlist/{{ $game->game_id}}">
                                @csrf
                                @method('DELETE')
                                <input type="hidden" name="game_slug" value="{{ $game->game_slug }}">
                                <input type="hidden" name="game_name" value="{{ $game->game_name }}">
                            </form>
                        </a>
                    </div>
                </div>
                @endforeach

                @else
                <h1>No games in wishlist!</h1>
                @endif
            </div>
        </div>
    </div>

@endsection
