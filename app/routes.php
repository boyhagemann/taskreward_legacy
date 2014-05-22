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

Route::resource('tasks', 'TaskController');
Route::resource('stream', 'StreamController');
Route::get('tasks/{tasks}/accept', array(
    'uses' => 'TaskController@accept',
    'as' => 'tasks.accept',
));

Route::group(array('prefix' => 'api', 'namespace' => 'Api'), function() {
	Route::resource('task', 'TaskController');
	Route::resource('stream', 'StreamController');
});


