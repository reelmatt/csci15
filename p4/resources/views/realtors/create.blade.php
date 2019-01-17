@extends('layouts.master')

@push('head')
    <link href='/css/realtors.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    New listing
@endsection

@section('content')
    <h1>Add new realtor</h1>
    @include('modules.error-form')
    <form method='POST' action='/realtors'>
        {{ csrf_field() }}

        <p class='submit'><input type='submit' value='Add realtor' class='btn btn-primary'>
            <input type='reset' value='Reset' class='btn btn-danger'></p>

        @include('inputs.realtor', ['realtorEdit' => true])
    </form>


@endsection