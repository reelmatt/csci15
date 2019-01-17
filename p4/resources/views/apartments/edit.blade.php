@extends('layouts.master')

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Edit {{ $listing->address }}
@endsection

@section('content')

    <h1>Edit &mdash; {{ $listing->address }} </h1>
    @include('modules.error-form')

    <form method='POST' action='/apartments/{{ $listing->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}
        <input type='submit' value='Save changes' class='btn btn-primary'><br/><br/>

        @include('inputs.info')
        @include('inputs.realtor', ['realtorEdit' => false])
        @include('inputs.features')
    </form>
@endsection