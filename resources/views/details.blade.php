@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="row">
                <div class="col-sm-auto align-self-center">
                    <img class="img-fluid" src="{{$details['image']}}" alt="#">
                </div>
                <div class="col align-self-center">
                    <h1>{{$details['title']}}</h1>
                    <h3 class="text-muted">{{$platform}}</h3>
                </div>
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
            <div class="row p-3 border rounded-lg">
                <div class="col">
                    <h3>Summary</h3>
                    <p class="lead">{{$details['description']}}</p>
                </div>
                <div class="col-auto align-self-center">
                    <div class="row">
                        @if ($details['score'] < 35)
                            <div class="score-bad">
                                <span>{{$details['score']}}</span>
                            </div>
                        @elseif ($details['score'] < 75)
                            <div class="score-mediocre float-right">
                                <span >{{$details['score']}}</span>
                            </div>
                        @else
                            <div class="score-good">
                                <span>{{$details['score']}}</span>
                            </div>
                        @endif
                    </div>
                    <div class="row justify-content-center">
                        <span><strong>Metascore</strong></span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
