@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @php
            $reviews = $user->reviews()->get();
            @endphp
            @if (count($reviews))
            <h1 class="mb-4">My Reviews</h1>

            @foreach ($reviews as $review)
            <div class="card mb-1">
                <div class="card-body pb-3 pt-3">
                        <a href="/search/{{$review->game_slug}}"><h5 class="card-title">{{ $review->game_name }}</h5></a>
                        <p class="card-text">{{ $review->rating }}</p>
                        <a href="/users/{{ Auth::id() }}/review/{{ $review->game_id }}" class="btn btn-danger float-right"
                            onclick="event.preventDefault(); document.getElementById('wishlist-delete').submit();">Delete</a>

                        <form id="wishlist-delete" method="POST"
                            action="/users/{{ Auth::id() }}/review/{{ $review->game_id }}">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="game_id" value="{{ $review->game_id }}">
                        </form>
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
