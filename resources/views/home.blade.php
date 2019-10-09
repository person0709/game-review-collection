@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <form method="GET" action="/search">
                @csrf
                <input class="form-control" type="text" name="keyword" placeholder="Enter a keyword">
            </form>

        </div>
    </div>
</div>
@endsection
