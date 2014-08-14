<?php



/*==========  Home  ==========*/
Route::get( '/', 			['as' => 'home', 		'uses' => 'HomeController@index'] );



/*
|--------------------------------------------------------------------------
| Ajax
|--------------------------------------------------------------------------
| 
| 
| 
*/
Route::group(array('prefix' => 'ajax'), function()
{
    Route::post('uploadAndSaveAvatar', 'UploadController@uploadAndSaveAvatar');
});

/*
|--------------------------------------------------------------------------
| Auth
| Signup
|--------------------------------------------------------------------------
| 
| Authorise by social (Social connect)
| 
*/
Route::post('signup', 				['as' => 'signup', 						'uses' => 'AuthController@store'] );

Route::group(array('prefix' => 'auth'), function()
{
    // social signin
    Route::get('{provider}', 		['as' => 'authenticate.authorise', 		'uses' => 'AuthController@authorise'] );
});



/*
|--------------------------------------------------------------------------
| Account
|--------------------------------------------------------------------------
| 
| edit or do anything with account
| 
*/
Route::group(['prefix' => 'account'], function()
{

	# Account index
	Route::get('/', 				['as' => 'account.index', 				'uses' => 'AccountController@index'] );

	# Complete account after newly signup
	Route::get('complete', 			['as' => 'account.complete', 			'uses' => 'AccountController@complete'] );
	Route::post('complete', 		'AccountController@updateComplete' );

	# Complete account after social connect (authorise)
	Route::get('completeSocial', 	['as' => 'account.completeSocial', 		'uses' => 'AccountController@completeSocial'] );
	Route::post('completeSocial', 	'AccountController@updateComplete' );

	# Edit account
	Route::get('edit', 				['as' => 'account.edit', 				'uses' => 'AccountController@edit'] );
	Route::post('edit', 			'AccountController@update' );

	// Change Password
	Route::get('change_password', 	['as' => 'account.change_password', 	'uses' => 'AccountController@getChangePassword']);
    Route::post('change_password', 	'AccountController@postChangePassword');

    // Forgot password
    // Route::get('forgot_password', 	['as' => 'account.forgot_password', 	'uses' => 'AccountController@getForgotPassword']);
    // Route::post('forgot_password', 	'AccountController@postForgotPassword');

});

/*
|--------------------------------------------------------------------------
| Password Reminder
|--------------------------------------------------------------------------
| 
| 
| 
*/
Route::controller('password', 'RemindersController');

/*
|--------------------------------------------------------------------------
| Session
|--------------------------------------------------------------------------
| 
| Log in and log out
| 
*/
// no login route in favor of comeonin
Route::post('login',            ['as' => 'session.store', 		'uses' => 'SessionController@store'] );
Route::get('logout',         	['as' => 'session.destroy',		'uses' => 'SessionController@destroy'] );


/*==========  Come on in (login or signup)  ==========*/
Route::get('comeonin',			['before' => 'guest', 		'as' => 'comeonin', 	'uses' => 'HomeController@comeonin'] );
