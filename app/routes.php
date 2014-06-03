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
Route::model('rewards', 'Reward');
Route::model('stream', 'Moment');

Route::resource('tasks', 'TaskController');
Route::resource('rewards', 'RewardController');
Route::resource('stream', 'StreamController');

Route::get('tasks/search/{q}', array(
	'uses' => 'TaskController@search',
	'as' => 'tasks.search',
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



Route::get('invite/{tokens}', array(
    'uses'  => 'InvitationController@create',
    'as'    => 'invitation.create'
));    
Route::post('invite/{tokens}', array(
    'uses'  => 'InvitationController@store',
    'as'    => 'invitation.store'
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
    
});




Route::group(array('prefix' => 'api', 'namespace' => 'Api'), function() {
	Route::resource('tasks', 'TaskController');
	Route::resource('rewards', 'RewardController');
	Route::resource('stream', 'StreamController');
	Route::resource('tokens', 'TokenController');
});



