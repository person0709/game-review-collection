@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if ($games)
            <h1 class="mb-4">Games found</h1>

            @foreach ($games as $item)
            <div class="card mb-1">
                <div class="card-body pb-3 pt-3">
                    <a href="/search/{{$item['slug']}}" class="stretched-link">
                        <h5 class="card-title">{{$item['name']}}</h5>
                    </a>
                </div>
            </div>
            @endforeach

            @else
            <h1>Games not found!</h1>
            @endif
        </div>
    </div>
</div>
@endsection
