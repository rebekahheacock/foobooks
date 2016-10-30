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

// single action controller with one method: __invoke
Route::get('/contact', 'ContactController')->name('contact');

// routes for static pages
Route::get('/help', 'PageController@help')->name('page.help');
Route::get('/faq', 'PageController@faq')->name('page.faq');

// practice route for debugbar
Route::get('/debugbar', function() {

  $data = Array('foo' => 'bar');
  Debugbar::info($data);
  Debugbar::info('Current environment: '.App::environment());
  Debugbar::error('Error!');
  Debugbar::warning('Watch out…');
  Debugbar::addMessage('Another message', 'mylabel');

  return 'Just demoing some of the features of Debugbar';

});

// practice route for Rych Random
Route::get('/random', function() {

    $random = new Rych\Random\Random();
    return $random->getRandomString(8);

});

// set up practice routes to use for testing
// DO NOT do this in your live application
// this is messy; you shouldn't use for loops in your routes/web.php file
// to generate routes
Route::get('/practice', 'PracticeController@index')->name('practice.index');
for($i = 0; $i < 100; $i++) {
    Route::get('/practice/'.$i, 'PracticeController@example'.$i)->name('practice.example'.$i);
}

// restrict log viewing to local environment
if (App::environment('local')) {
  Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');
}

// check DB connection
Route::get('/debug', function() {

    echo '<pre>';

    echo '<h1>Environment</h1>';
    echo App::environment().'</h1>';

    echo '<h1>Debugging?</h1>';
    if(config('app.debug')) echo "Yes"; else echo "No";

    echo '<h1>Database Config</h1>';
    /*
    The following line will output your MySQL credentials.
    Uncomment it only if you're having a hard time connecting to the database and you
    need to confirm your credentials.
    When you're done debugging, comment it back out so you don't accidentally leave it
    running on your live server, making your credentials public.
    */
    //print_r(config('database.connections.mysql'));

    echo '<h1>Test Database Connection</h1>';
    try {
        $results = DB::select('SHOW DATABASES;');
        echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
        echo "<br><br>Your Databases:<br><br>";
        print_r($results);
    }
    catch (Exception $e) {
        echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
    }

    echo '</pre>';

});


