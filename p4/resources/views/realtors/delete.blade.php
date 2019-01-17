@extends('layouts.master')

@push('head')
    <link href='/css/realtors.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Delete {{ $realtor->getFullName() }}
@endsection

@section('content')

    <h1>Delete {{ $realtor->getFullName() }}?</h1>

    @if(count($realtor->listing) > 0)
        <p>{{ $realtor->getFullName() }} is currently associated with the following listings:</p>
        @foreach($realtor->listing as $listing)
            <p class='listing'><a href='/apartments/{{$listing->id}}'>{{$listing->address}}</a></p>
        @endforeach
        <p>In order to delete this realtor, please first assign these listings to another realtor</p>
    @else
        <p><i>No current listings.</i></p>
        <h2>You are about to delete the listing for {{ $realtor->getFullName()}}. Are you sure you want to do this?</h2>
        <form method='POST' action='/realtors/{{ $realtor->id }}'>
            {{ method_field('DELETE') }}
            {{ csrf_field() }}

            <input type='submit' value='Yes, delete me.' class='btn btn-danger'>
            <p><a href='/realtors/{{ $realtor->id }}' class='btn btn-info'>No, take me back to safety.</a></p>
        </form>
    @endif
@endsection