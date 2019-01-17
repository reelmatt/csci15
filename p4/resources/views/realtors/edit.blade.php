@extends('layouts.master')

@push('head')
    <link href='/css/realtors.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    Edit {{ $realtor->first_name }}
@endsection

@section('content')

    <h1>Edit &mdash; {{ $realtor->getFullName() }}</h1>

    <form method='POST' action='/realtors/{{ $realtor->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}
        <div class='submit'>
            <input type='submit' value='Save changes' class='btn btn-primary'>
        </div>
        @include('inputs.realtor', ['realtorEdit' => true])
    </form>

    @include('modules.error-form')
@endsection