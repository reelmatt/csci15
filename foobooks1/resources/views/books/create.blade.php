@extends('layouts.master')

@section('title')
    New book
@endsection

@section('content')

    <h1>Add a new book</h1>

    <form method='POST' action='/books'>
        {{ csrf_field() }}

        @include('books.bookFormInputs')

        <input type='submit' value='Add book' class='btn btn-primary'>
    </form>

    @include('modules.error-form')



@endsection