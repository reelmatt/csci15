@extends('layouts.master')

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Delete {{ $listing->address }}
@endsection

@section('content')

    <h1>Delete Listing</h1>
    <h2>You are about to delete the listing for {{ $listing->address }}. Are you sure you want to do this?</h2>

    <form method='POST' action='/apartments/{{ $listing->id }}'>
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <input type='submit' value='Yes, delete me.' class='btn btn-danger'>
        <p><a href='/apartments/{{ $listing->id }}' class='btn btn-info'>No, take me back to safety.</a></p>
    </form>



@endsection