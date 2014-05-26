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

Route::get('/', array(
    'uses' => 'HomeController@index',
    'as' => 'home',
));

Route::model('tasks', 'Task');
Route::model('stream', 'Moment');
Route::bind('tokens', function($key) {
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


/*
|--------------------------------------------------------------------------
| User Routes
|--------------------------------------------------------------------------
*/
Route::get('login', array(
    'uses' => 'UserController@login',
    'as' => 'user.login',
));
Route::post('login', array(
    'uses' => 'UserController@auth',
    'as' => 'user.auth',
));
Route::get('register', array(
    'uses' => 'UserController@register',
    'as' => 'user.register',
));



Route::group(array('before' => 'auth', ), function() {    

    Route::get('logout', array(
        'uses' => 'UserController@logout',
        'as' => 'user.logout',
    ));
    Route::get('account/dashboard', array(
        'uses' => 'UserController@dashboard',
        'as' => 'user.dashboard',
    ));
    
    Route::resource('invitation', 'InvitationController');    
});




Route::group(array('prefix' => 'api', 'namespace' => 'Api'), function() {
	Route::resource('tasks', 'TaskController');
	Route::resource('stream', 'StreamController');
	Route::resource('tokens', 'TokenController');
});



