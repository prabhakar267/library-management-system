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

Route::get('/', 
	  array('as' => 'home', 
	        'uses' => 'HomeController@home'
));

/* Unauthenticated group */
Route::group(array('before' => 'guest'), function() {
 
	/* CSRF protection */
	Route::group(array('before' => 'csrf'), function() {

		/* Create an account (POST) */
		Route::post('/account/create', 
			array('as' => 'account-create-post',
				'uses' => 'AccountController@postCreate'
		));

		/* Sign in (POST) */
		Route::post('/account/sign-in', 
			array('as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

	});

	/* Sign in (GET) */
	Route::get('/account/sign-in', 
		array('as' => 'account-sign-in',
			'uses' => 'AccountController@getSignIn'
	));

	/* Create an account (GET) */
	Route::get('/account/create', 
		array('as' => 'account-create',
		      'uses' => 'AccountController@getCreate'
	));
        
});

/* Authenticated group */
Route::group(array('before' => 'auth'), function() {
    /* Sign out (GET) */
    Route::get('/account/sign-out', 
            array('as' => 'account-sign-out',
                    'uses' => 'AccountController@getSignOut'
    ));
    Route::get('/usage-test', array('as' => 'usage-test', 'uses' => 'HomeController@usageTest'));
});

/* API Calls */
/*  To access any of the Routes within this Group, 
	we need to send the API Key in the Header with Key Name "X-Auth-Token" */
Route::group(array('prefix' => 'api/v1', 'before' => 'auth.token'), function() {

    Route::get('/test', function() {
    	return "Accessing Protected resource of " . Auth::user()->login;
    });
    
});  