<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource generates all seven of the routes listed below
Route::resource('books', 'BookController');

// Route::get('/books', 'BookController@index')->name('books.index');
// Route::get('/books/create', 'BookController@create')->name('books.create');
// Route::post('/books', 'BookController@store')->name('books.store');
// Route::get('/books/{book}', 'BookController@show')->name('books.show');
// Route::get('/books/{book}/edit', 'BookController@edit')->name('books.edit');
// Route::put('/books/{book}', 'BookController@update')->name('books.update');
// Route::delete('/books/{book}', 'BookController@destroy')->name('books.destroy');

// set up practice routes to use for testing
// DO NOT do this in your live application
// this is messy; you shouldn't use for loops in your routes/web.php file
// to generate routes
Route::get('/practice', 'PracticeController@index')->name('practice.index');
for($i = 0; $i < 100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}
