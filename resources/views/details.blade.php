@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">

                {{-- Game image --}}
                <div class="col-sm-auto align-self-center">
                    <img class="img-thumbnail" style="width:11rem;" src="{{$details['background_image']}}"
                        alt="{{$details['background_image_additional']}}">
                </div>

                {{-- Title & platform & wishlist button --}}
                <div class="col-lg align-self-center">
                    <div class="row">
                        <div class="col">
                            <h1>{{$details['name']}}</h1>
                            @guest
                            <a class="btn btn-secondary" href="{{route('login')}}">Login to add to wishlist</a>
                            @else
                            <form method="POST" action="/users/{{ Auth::id() }}/wishlist/{{ $details['id'] }}">
                                @csrf
                                <input type="hidden" name="game_id" value="{{ $details['id'] }}">
                                <input type="hidden" name="game_slug" value="{{ $details['slug'] }}">
                                <input type="hidden" name="game_name" value="{{ $details['name'] }}">

                                @if (Auth::user()->isInWishlist($details['id']))
                                @method('DELETE')
                                <button class="btn btn-success" type="submit">Added to wishlist</button>
                                @else
                                <button class="btn btn-primary" type="submit">Add to wishlist</button>
                                @endif
                            </form>
                            @endguest
                        </div>
                    </div>
                </div>

                {{-- Game details --}}
                <div class="col-md-auto">
                    <div class="px-3 text-right">
                        <strong>Relase date: </strong>{{$details['released']}}
                    </div>
                    <div class="px-3 text-right">
                        <strong>Genres: </strong>
                        @foreach ($details['genres'] as $item)
                        {{ $item['name'], }}
                        @endforeach
                    </div>
                    <div class="px-3 text-right">
                        <strong>Developers: </strong>
                        @foreach ($details['developers'] as $item)
                        {{ $item['name'], }}
                        @endforeach
                    </div>
                    <div class="px-3 text-right">
                        <strong>Publisher: </strong>
                        @foreach ($details['publishers'] as $item)
                        {{ $item['name'], }}
                        @endforeach
                    </div>
                    @if ($details['esrb_rating'])
                    <div class="px-3 text-right">
                        <strong>ESRB rating: </strong>{{$details['esrb_rating']['name']}}
                        @endif
                    </div>
                </div>
            </div>

            {{-- sucess/fail alert --}}
            @if (session()->has('message'))
            <div class="alert alert-primary text-center" role="alert">
                <strong>{{session()->get('message')}}</strong>
            </div>
            @endif

            {{-- Summary --}}
            <div class="row border rounded-lg w-100 py-3 m-2">
                <div class="col">
                    <h3>Summary</h3>
                    <p class="lead">{{$details['description_raw']}}</p>
                </div>
            </div>

            {{-- Metascore & User review --}}
            <div class="row w-100 m-2 border rounded-lg">

                 {{-- Metascore --}}
                @if ($details['metacritic'])
                <div class="col-auto align-self-center">
                    <div class="row px-3">
                        @if ($details['metacritic'] < 35)
                        <div class="score-bad">
                            <span id="metascore">{{$details['metacritic']}}</span>
                        </div>
                        @elseif ($details['metacritic'] < 75)
                        <div class="score-mediocre">
                            <span id="metascore">{{$details['metacritic']}}</span>
                        </div>
                        @else
                        <div class="score-good">
                            <span id="metascore">{{$details['metacritic']}}</span>
                        </div>
                        @endif
                    </div>
                    <div class="row justify-content-center">
                        <span><strong>Metascore</strong></span>
                    </div>
                </div>
                @endif

                {{-- User review --}}
                <div class="col text-center p-3">
                    <div class="row">
                        <div class="col">
                            <h3>Your rating</h3>
                        </div>
                    </div>
                    <form id="user-review-save" action="/users/{{Auth::id()}}/review/{{ $details['id'] }}" method="POST">
                        @csrf

                        {{-- Star rating --}}
                        <div class="row justify-content-center">
                            <input type="hidden" name="game_slug" value="{{ $details['slug'] }}">
                            <input type="hidden" name="game_name" value="{{ $details['name'] }}">
                            <fieldset class="rate">
                                @for ($i = 10; $i >= 1; $i--)
                                @if ($i % 2 == 0)
                                <input type="radio" id="rating{{$i}}" name="rating" value="{{$i}}" {!! $review ? "disabled" : ""
                                    !!} {!! $review['rating']==$i ? "checked" : "" !!} />
                                <label for="rating{{$i}}" title="{{$i/2}} stars"></label>
                                @else
                                <input type="radio" id="rating{{$i}}" name="rating" value="{{$i}}" {!! $review ? "disabled" : ""
                                    !!} {!! $review['rating']==$i ? "checked" : "" !!} />
                                <label class="half" for="rating{{$i}}" title="{{$i/2}} stars"></label>
                                @endif
                                @endfor
                            </fieldset>
                        </div>
                        <h2 class="font-weight-bold" id=rate-label></h2>

                        {{-- Text review --}}
                        <div class="row">
                            <div class="col">
                                <fieldset id="review-text">
                                    <div class="card-deck text-left my-4 mx-3">
                                        <div class="card border-success">
                                            <div class="card-header h4">The goods</div>
                                            <div class="card-body">
                                                @if (!$review)
                                                <textarea id="review-pro" class="form-control" name="pros" rows="5"
                                                    placeholder="Tell us what you liked!"></textarea>
                                                @else
                                                <p class="card-text">{{ $review['pros'] }}</p>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="card border-danger">
                                            <div class="card-header h4">The bads</div>
                                            <div class="card-body">
                                                @if (!$review)
                                                <textarea id="review-con" class="form-control" name="cons" rows="5"
                                                    placeholder="Tell us what you didn't like!"></textarea>
                                                @else
                                                <p class="card-text">{{ $review['cons'] }}</p>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </fieldset>

                                @if (!$review)
                                {{-- Save button --}}
                                <a class="btn btn-primary" href="/users/{{ Auth::id() }}/review/{{ $details['id'] }}"
                                    onclick="event.preventDefault(); document.getElementById('user-review-save').submit();">Save</a>

                                @else
                                {{-- Edit button --}}
                                <button class="btn btn-primary" type="button">Edit</button>

                                {{-- Delete button --}}
                                <a class="btn btn-danger" href="/users/{{ Auth::id() }}/review/{{ $details['id'] }}"
                                    onclick="event.preventDefault(); document.getElementById('user-review-delete').submit();">Delete</a>
                                @endif
                            </div>
                        </div>
                    </form>
                    <form id="user-review-delete" action="/users/{{ Auth::id() }}/review/{{ $details['id'] }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
            </div>
        </div>
    </div>
<div>
@endsection
