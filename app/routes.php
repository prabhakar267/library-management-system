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


// Unauthenticated group 
Route::group(array('before' => 'guest'), function() {
 
	// CSRF protection 
	Route::group(array('before' => 'csrf'), function() {

		// Create an account (POST) 
		Route::post('/create', array(
			'as' => 'account-create-post',
			'uses' => 'AccountController@postCreate'
		));

		// Sign in (POST) 
		Route::post('/sign-in', array(
			'as' => 'account-sign-in-post',
			'uses' => 'AccountController@postSignIn'
		));

		// Sign in (POST) 
		Route::post('/student-registration', array(
			'as' => 'student-registration-post',
			'uses' => 'StudentController@postRegistration'
		));		

	});

	// Sign in (GET) 
	Route::get('/sign-in', array(
		'as' 	=> 'account-sign-in',
		'uses'	=> 'AccountController@getSignIn'
	));

	// Create an account (GET) 
	Route::get('/create', array(
		'as' 	=> 'account-create',
		'uses' 	=> 'AccountController@getCreate'
	));

	// Student Registeration form 
	Route::get('/student-registration', array(
		'as' 	=> 'student-registration',
		'uses' 	=> 'StudentController@getRegistration'
	));
    
    Route::get('/book', array(
        'as' => 'search-book',
        'uses' => 'BooksController@searchBook'
    ));    
	

});

Route::resource('/books', 'BooksController');

// Authenticated group 
Route::group(array('before' => 'auth'), function() {

	// Home Page of Control Panel
	Route::get('/',array(
		'as' 	=> 'home',
		'uses'	=> 'HomeController@home'
	));	

	// Add Books to Database
    Route::get('/add-books', array(
        'as' => 'add-books',
        'uses' => 'BooksController@renderAddBooks'
    ));

	// Add Books to Database
    Route::get('/all-books', array(
        'as' => 'all-books',
        'uses' => 'BooksController@renderAllBooks'
    ));

	// Students
    Route::get('/registered-students', array(
        'as' => 'registered-students',
        'uses' => 'StudentController@renderStudents'
    ));

    Route::get('/students-for-approval', array(
        'as' => 'students-for-approval',
        'uses' => 'StudentController@renderApprovalStudents'
    ));

    Route::resource('/student', 'StudentController');

    // Issue Logs
    Route::get('/issue-return', array(
        'as' => 'issue-return',
        'uses' => 'LogController@renderIssueReturn'
    ));

    Route::get('/currently-issued', array(
        'as' => 'currently-issued',
        'uses' => 'LogController@renderLogs'
    ));

    Route::resource('/issue-log', 'LogController');


	// Sign out (GET) 
    Route::get('/sign-out', array(
    	'as' => 'account-sign-out',
		'uses' => 'AccountController@getSignOut'
    ));
});
