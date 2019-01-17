@extends('layouts.master')

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
    <link href='/css/search.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Search
@endsection

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
@endpush

@section('content')
    <div class='search'>
        <form method='GET' action='/apartments/search/results'>
            <p><input type='submit' value='Search' class='btn btn-primary'></p>
            @include('inputs.search')
        </form>
    </div>
@endsection