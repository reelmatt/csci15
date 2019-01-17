<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Misc. pages
 */
Route::get('/', 'PageController@welcome');
Route::get('/about', 'PageController@about');
Route::get('/contact', 'PageController@contact');


/**
 * Books
 */
Route::get('/books', 'BookController@index');

Route::get('/books/create', 'BookController@create');
Route::post('/books', 'BookController@store');

Route::get('/books/search', 'BookController@search');

Route::get('/books/{id}', 'BookController@show');


# Show the form to edit a specific book
Route::get('/books/{id}/edit', 'BookController@edit');

# Process the form to edit a specific book
Route::put('/books/{id}', 'BookController@update');

Route::get('/books/{id}/delete', 'BookController@delete');
Route::delete('/books/{id}', 'BookController@destroy');

/**
 * Practice
 */
Route::any('/practice/{n?}', 'PracticeController@index');


/**
 * Example routes shown at the end of Week 6 and Week 8 lectures
 */
Route::get('/trivia', 'TriviaController@index');
Route::get('/trivia/result', 'TriviaController@result');