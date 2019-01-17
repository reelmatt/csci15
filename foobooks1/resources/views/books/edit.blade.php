@extends('layouts.master')

@section('title')
    Edit  {{$book->title}}
@endsection

@section('content')

    <h1>Edit</h1>
    <h2>{{$book->title}}</h2>

    <form method='POST' action='/books/{{ $book->id }}'>
        {{ method_field('put') }}
        {{ csrf_field() }}

        @include('books.bookFormInputs')


        <input type='submit' value='Save changes' class='btn btn-primary'>
    </form>

    @include('modules.error-form')



@endsection