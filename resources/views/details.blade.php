@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="row">

                {{-- Game image --}}
                <div class="col-sm-auto align-self-center">
                    <img class="img-thumbnail" style="width:10rem;" src="{{$details['background_image']}}" alt="{{$details['background_image_additional']}}">
                </div>

                {{-- Title & platform & wishlist button --}}
                <div class="col-lg align-self-center">
                    <div class="row">
                        <div class="col">
                            <h1>{{$details['name']}}</h1>
                        </div>
                        <div class="col-sm-auto">
                            @guest
                                <a class="btn btn-secondary" href="{{route('login')}}">Login to add to wishlist</a>
                            @else
                                @php
                                    $is_added = Auth::user()->wishlist()->where('game_id',$details['id'])->exists();
                                @endphp
                                <form method="POST" action="/users/{{ Auth::id() }}/wishlist">
                                    @csrf
                                    <input type="hidden" name="game_id" value="{{ $details['id'] }}">
                                    <input type="hidden" name="game_slug" value="{{ $details['slug'] }}">

                                    @if ($is_added)
                                    @method('DELETE')
                                    <button class="btn btn-success" type="submit">Added to wishlist</button>
                                    @else
                                    <button class="btn btn-primary" type="submit">Add to wishlist</button>
                                    @endif
                                </form>
                            @endguest
                        </div>
                    </div>
                    {{-- <div class="row">
                        <div class="col align-self-end">
                            <h3 class="text-muted mb-0">{{$platform}}</h3>
                        </div>
                    </div> --}}
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

            {{-- Summary & metascore --}}
            <div class="row p-3 mt-2 border rounded-lg">
                <div class="col">
                    <h3>Summary</h3>
                    <p class="lead">{{$details['description_raw']}}</p>
                </div>
                <div class="col-auto align-self-center">
                    <div class="row">
                        @if ($details['metacritic'] < 35)
                            <div class="score-bad">
                                <span id="metascore">{{$details['metacritic']}}</span>
                            </div>
                        @elseif ($details['metacritic'] < 75)
                            <div class="score-mediocre float-right">
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
            </div>

            {{-- User review --}}
            <div class="row p-3 mt-2 border rounded-lg">
                <div class="col text-center">
                    <div class="row">
                        <div class="col">
                            <h3>Your rating</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <fieldset class="rate">
                                <input type="radio" id="rating10" name="rating" value="10" /><label for="rating10" title="5 stars"></label>
                                <input type="radio" id="rating9" name="rating" value="9" /><label class="half" for="rating9" title="4 1/2 stars"></label>
                                <input type="radio" id="rating8" name="rating" value="8" /><label for="rating8" title="4 stars"></label>
                                <input type="radio" id="rating7" name="rating" value="7" /><label class="half" for="rating7" title="3 1/2 stars"></label>
                                <input type="radio" id="rating6" name="rating" value="6" /><label for="rating6" title="3 stars"></label>
                                <input type="radio" id="rating5" name="rating" value="5" /><label class="half" for="rating5" title="2 1/2 stars"></label>
                                <input type="radio" id="rating4" name="rating" value="4" /><label for="rating4" title="2 stars"></label>
                                <input type="radio" id="rating3" name="rating" value="3" /><label class="half" for="rating3" title="1 1/2 stars"></label>
                                <input type="radio" id="rating2" name="rating" value="2" /><label for="rating2" title="1 star"></label>
                                <input type="radio" id="rating1" name="rating" value="1" /><label class="half" for="rating1" title="1/2 star"></label>
                            </fieldset>
                        </div>
                    </div>
                    <h2 class="font-weight-bold" id=rateLabel></h2>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
