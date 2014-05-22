<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', 'HomeController@index');

Route::model('tasks', 'Task');
Route::model('stream', 'Moment');
Route::bind('token', function($key) {
    return Token::where('key', $key)->firstOrFail();
});

Route::resource('tasks', 'TaskController');
Route::resource('stream', 'StreamController');
Route::get('tasks/{tasks}/accept', array(
    'before' => 'auth',
    'uses' => 'TaskController@accept',
    'as' => 'tasks.accept',
));

Route::get('r/{token}', array(
    'uses' => 'TokenController@redirect',
    'as' => 'token.redirect',
));

Route::group(array('prefix' => 'api', 'namespace' => 'Api'), function() {
	Route::resource('task', 'TaskController');
	Route::resource('stream', 'StreamController');
});


