@extends('layouts.master')

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
    <link href='/css/search.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Search
@endsection

@section('content')
    <div class='results'>
        @if($results->count() > 0)
            <h2>Results for criteria:</h2>
            <p>
                @if(count($queries) > 0 )
                    <em> {{$queryString}} </em>
                @else
                    <em>No criteria selected. All listings shown.</em>
                @endif
            </p>
            <div class='grid'>
                @foreach($results as $result)
                    <div class='listing'>
                        <a href='/apartments/{{$result['id']}}'>
                            <h3>{{ $result['address'] }}</h3>
                            <p>{{ $result['city'] }}, {{ $result['state'] }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        @else
            <h2>Results for criteria:</h2>
            <p>
                <em> {{$queryString}} </em>
            </p>
            <p>No results found.</p>
        @endif
    </div>
    <div class='search'>
        <form method='GET' action='/apartments/search/results'>
            <p><input type='submit' value='Search' class='btn btn-primary'></p>
            @include('inputs.results')
        </form>
    </div>

@endsection