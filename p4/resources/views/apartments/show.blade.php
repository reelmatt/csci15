@extends('layouts.master')

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Show
@endsection

@section('content')
    <h1>Listing for {{ $listing->getFullAddress($map = false) }}</h1>
    <iframe
            class='map'
            src="https://www.google.com/maps/embed/v1/place?key=AIzaSyCrZ0aVUq666D7ULLPE1yN7KlA5QaoQllk&q={{$listing->getFullAddress($map = true)}}"
            allowfullscreen>
    </iframe>

    <div class='info'>
        <h3>Apartment Details</h3>
        <p><b>Available:</b> {{date_format(date_create($listing->date_available), "F j, Y")}}</p>
        <p><b>Monthly rent:</b> {{ $listing->price == null ? 'N/A' : '$' . number_format($listing->price) }}</p>
        <p><b>Beds:</b> {{ ($listing->beds == null) ? 'N/A' : $listing->beds }}</p>
        <p><b>Baths:</b> {{ ($listing->baths == null) ? 'N/A' : $listing->baths }}</p>
        <p><b>Square feet:</b> {{ ($listing->sqft == null) ? 'N/A' : $listing->sqft}}</p>
        <p><b>Realtor:</b> <a href='/realtors/{{ $listing->realtor_id }}'>{{ $listing->realtor->getFullName() }}</a></p>
        <p>See full listing at <a href='{{ $listing->reference_url }}'>{{ $listing->realtor->company }}</a></p>

        @if(count($features) > 0)
            <div class='features'>
                <h3>Apartment Features</h3>
                <ul class='feature'>
                    @foreach($features as $feature)
                        <li class='feature'>{{ ucfirst($feature) }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </div>

    <div class='action'>
        <a href='/apartments/{{$listing->id}}/edit' class='btn btn-info'>Edit Details</a>
        <a href='/apartments/{{$listing->id}}/delete' class='btn btn-danger'>Remove Listing</a>
    </div>
@endsection
