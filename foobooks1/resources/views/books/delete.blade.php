@extends('layouts.master')

@section('title')
    Delete  {{$title}}
@endsection

@section('content')

    <h1>Delete Book</h1>
    <h2>You are about to delete {{$title}}. Are you sure you want to do this?</h2>

    <form method='POST' action='/books/{{ $id }}'>
        {{ method_field('DELETE') }}
        {{ csrf_field() }}

        <input type='submit' value='Yes, delete me.'>
    </form>

    <p><a href='/books/{{$id}}'>No, take me back to safety.</a></p>

@endsection