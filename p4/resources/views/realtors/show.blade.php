@extends('layouts.master')

@push('head')
    <link href='/css/realtors.css' type='text/css' rel='stylesheet'>
@endpush

@section('title')
    {{ $realtor->getFullName() }}
@endsection

@section('content')
    <h1>{{ $realtor->getFullName() }}</h1>
    <div>
        <h3>Contact:</h3>
        <p>{{ $realtor->company }}</p>
        <p>Email: <a href='mailto:{{ $realtor->email }}'>{{ $realtor->email }}</a></p>
        <p>Phone: {{$realtor->formatPhone()}}</p>

        <h3>Current listings:</h3>
        @if(count($realtor->listing) > 0)
            @foreach($realtor->listing as $listing)
                <p class='listing'><a href='/apartments/{{$listing->id}}'>{{$listing->address}}</a></p>
            @endforeach
        @else
            <p><i>No current listings.</i></p>
        @endif

        <div class='action'>
            <a href='/realtors/{{$realtor->id}}/edit' class='btn btn-info'>Edit Details</a>
            <a href='/realtors/{{$realtor->id}}/delete' class='btn btn-danger'>Remove Realtor</a>
        </div>
    </div>
@endsection
