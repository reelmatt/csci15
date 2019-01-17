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
Route::get('/login', 'PageController@login');

/**
 * Apartments
 */
Route::get('/apartments', 'ApartmentController@index');
Route::get('/realtors', 'RealtorController@index');

# Search/results routes
Route::get('/apartments/search', 'ApartmentController@search');
Route::get('/apartments/search/results', 'ApartmentController@results');

# Creation routes
Route::get('/apartments/create', 'ApartmentController@create');
Route::post('/apartments', 'ApartmentController@store');
Route::get('/realtors/create', 'RealtorController@create');
Route::post('/realtors', 'RealtorController@store');

# Read route
Route::get('/apartments/{id}', 'ApartmentController@show');
Route::get('/realtors/{id}', 'RealtorController@show');

# Show the form to edit a specific listing
Route::get('/apartments/{id}/edit', 'ApartmentController@edit');
Route::get('/realtors/{id}/edit', 'RealtorController@edit');

# Process the form to edit a specific listing
Route::put('/apartments/{id}', 'ApartmentController@update');
Route::put('/realtors/{id}', 'RealtorController@update');

# Deletion routes
Route::get('/apartments/{id}/delete', 'ApartmentController@delete');
Route::delete('/apartments/{id}', 'ApartmentController@destroy');
Route::get('/realtors/{id}/delete', 'RealtorController@delete');
Route::delete('/realtors/{id}', 'RealtorController@destroy');

