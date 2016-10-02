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

// example GET route for /books
Route::get('/books', function() {
  return 'Here are all the books...';
});

// example GET and POST routes for /books/create
Route::get('/books/create', function() {
  $view  = '<form method="POST" action="/books/create">';
  $view .= csrf_field(); # This will be explained more later
  $view .= '<label>Title: <input type="text" name="title"></label>';
  $view .= '<input type="submit">';
  $view .= '</form>';
  return $view;
});

Route::post('/books/create', function() {
  dd(Request::all());
});

// example GET route for /books/show/{title}
// takes an optional {title} parameter
Route::get('/books/show/{title?}', function($title = '') {
  if($title == '') {
    return 'Your request did not include a title.'
  }
  return 'Results for the book: '.$title;
})->name('books.show');
