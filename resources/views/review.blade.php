@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if (count($reviews))
            <h1 class="mb-4">My Reviews</h1>

            @foreach ($reviews as $review)
            <div class="card mb-1">
                <div class="card-body pb-3 pt-3">
                    <a href="/search/{{$review->game_slug}}"><h4 class="card-title">{{ $review->game_name }}</h4></a>
                    <p class="card-text">
                        @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $review->rating / 2)
                        <i class="fa fa-star fa-3x" style="color:gold" aria-hidden="true"></i>
                        @elseif ($i - $review->rating / 2  == 0.5)
                        <i class="fa fa-star-half-o fa-3x" style="color:gold" aria-hidden="true"></i>
                        @else
                        <i class="fa fa-star-o fa-3x" style="color:gold" aria-hidden="true"></i>
                        @endif
                        @endfor

                        <a href="/users/{{ Auth::id() }}/review/{{ $review->game_id }}" class="btn btn-danger float-right"
                            onclick="event.preventDefault(); document.getElementById('review-delete-{{$review->game_id}}').submit();">Delete</a>

                        <form id="review-delete-{{$review->game_id}}" method="POST"
                            action="/users/{{ Auth::id() }}/review/{{ $review->game_id }}">
                            @csrf
                            @method('DELETE')
                        </form>
                    </p>

                </div>
            </div>
            @endforeach

            @else
            <h1>No reviews yet!</h1>
            @endif
        </div>
    </div>
</div>

@endsection
