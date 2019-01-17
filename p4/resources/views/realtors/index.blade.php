@extends('layouts.master')

@push('head')
    <link href='/css/realtors.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Index
@endsection

@section('content')
    <h1>All Realtors</h1>
    @if(count($realtors) > 0)
        <div class='realtors'>
            @foreach($realtors as $realtor)
                <div class='realtor'>
                    <h2>{{ $realtor->getFullName() }}</h2>
                    <p>{{ $realtor->company }}</p>

                    <a href='mailto:{{ $realtor->email }}'>Email</a> |
                    <a href='/realtors/{{ $realtor->id }}'>Realtor Info</a>
                    <p class='currentListings'>Current Listings:</p>
                    <ul class='currentListings'>
                        @if(count($realtor->listing) == 0)
                            <li class='noListings'><i>No current listings</i></li>
                        @else
                            @foreach($realtor->listing as $listing)
                                <li><a href='/apartments/{{$listing->id}}'>{{$listing->address}}</a></li>
                            @endforeach
                        @endif
                    </ul>
                </div>
            @endforeach
        </div>
    @endif
@endsection