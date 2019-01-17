@extends('layouts.master')

@push('head')
    <link href='/css/listings.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    New listing
@endsection

@section('content')
    <h1>Add new listing</h1>
    @include('modules.error-form')
    <form method='POST' action='/apartments'>
        {{ csrf_field() }}
        <div>
            <p><input type='submit' value='Add listing' class='btn btn-primary'>
                <input type='reset' value='Reset' class='btn btn-danger'></p>
        </div>

        @include('inputs.info')
        @include('inputs.realtor', ['realtorEdit' => false])
        @include('inputs.features')
    </form>


@endsection