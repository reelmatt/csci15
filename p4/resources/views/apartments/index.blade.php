@extends('layouts.master')

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Index
@endsection

@section('content')
    <h1>All Listings</h1>
    @if(count($listings) > 0)
        <div class='grid'>
            @foreach($listings as $listing)
                <div class='listing'>

                    <h2>{{ $listing->address }}</h2>
                    <p>{{ $listing->city }}, {{ $listing->state }}</p>
                    <p>{{ $listing->price == null ? 'Price N/a' : '$' . number_format($listing->price) }}</p>

                    <a href='/apartments/{{ $listing->id }}'>Listing Info</a> |
                    @if($listing->reference_url == null)
                        External link not available
                    @else
                        <a href='{{ $listing->reference_url }}' target='_blank'>
                        Listing on {{ $listing->realtor->company }} </a>
                    @endif
                </div>
            @endforeach
        </div>
    @endif
@endsection