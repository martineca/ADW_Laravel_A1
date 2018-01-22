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

/*Route::get('/', function () {
    return view('/notes/index');
});*/
Route::get('/','NotesController@index')->name('notes.index');
Route::get('/notes/create', 'NotesController@create')->name('notes.create');
Route::post('/notes', 'NotesController@store')->name('notes.store');
Route::get('/notes/{note}/edit', 'NotesController@edit')->name('notes.edit');
Route::put('/notes/{note}', 'NotesController@update')->name('notes.update');
Route::delete('/notes/{note}', 'NotesController@destroy')->name('notes.delete');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
