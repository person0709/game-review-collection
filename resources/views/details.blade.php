@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">

                {{-- Game image --}}
                <div class="col-sm-auto align-self-center">
                    <img class="img-fluid" src="{{$details['image']}}" alt="#">
                </div>

                {{-- Title & platform & wishlist button --}}
                <div class="col align-self-center">
                    <h1>{{$details['title']}}</h1>
                    <div class="row">
                        <div class="col align-self-end">
                            <h3 class="text-muted mb-0">{{$platform}}</h3>
                        </div>
                        <div class="col text-right">
                            @if (Auth::user()->wishlist()->where('game_name',$details['title']))
                            <button class="btn btn-primary" type="button" method="POST"
                            action="/wishlist/{{ Auth::user()->id }}">Add to wishlist</button>
                            @else
                            <button class="btn btn-success" type="button" method="POST"
                            action="/wishlist/{{ Auth::user()->id }}">Added to wishlist</button>
                            @endif

                        </div>
                    </div>
                </div>

                {{-- Game details --}}
                <div class="col m-auto">
                    <div class="px-3 text-right">
                        <strong>Relase date: </strong>{{$details['releaseDate']}}
                    </div>
                    <div class="px-3 text-right">
                        <strong>Genres: </strong>{{implode(', ', $details['genre'])}}
                    </div>
                    <div class="px-3 text-right">
                        <strong>Developer: </strong>{{$details['developer']}}
                    </div>
                    <div class="px-3 text-right">
                        <strong>Publisher: </strong>{{implode(', ', $details['publisher'])}}
                    </div>
                    <div class="px-3 text-right">
                        <strong>Rating: </strong>{{$details['rating']}}
                    </div>
                    @if ($details['alsoAvailableOn'])
                    <div class="px-3 text-right">
                        <strong>Also available on: </strong>{{implode(', ', $details['alsoAvailableOn'])}}
                    </div>
                    @endif
                </div>
            </div>

            {{-- Summary & metascore --}}
            <div class="row p-3 mt-2 border rounded-lg">
                <div class="col">
                    <h3>Summary</h3>
                    <p class="lead">{{$details['description']}}</p>
                </div>
                <div class="col-auto align-self-center">
                    <div class="row">
                        @if ($details['score'] < 35)
                            <div class="score-bad">
                                <span id="metascore">{{$details['score']}}</span>
                            </div>
                        @elseif ($details['score'] < 75)
                            <div class="score-mediocre float-right">
                                <span id="metascore">{{$details['score']}}</span>
                            </div>
                        @else
                            <div class="score-good">
                                <span id="metascore">{{$details['score']}}</span>
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
