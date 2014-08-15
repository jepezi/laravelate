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
Route::post('signup', 				['before' => 'guest',		'as' => 'signup', 				'uses' => 'AuthController@store'] );

Route::group(array('prefix' => 'auth'), function()
{
	// social signin
    Route::get('{provider}', 		['before' => 'guest',		'as' => 'authenticate.authorise', 		'uses' => 'AuthController@authorise'] );
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

	# Edit account
	Route::get('edit', 				['as' => 'account.edit', 				'uses' => 'AccountController@edit'] );
	Route::post('edit', 			'AccountController@update' );

	// Change Password
	Route::get('change_password', 	['before' => 'nativeuser',		'as' => 'account.change_password', 	'uses' => 'AccountController@getChangePassword']);
    Route::post('change_password', 	'AccountController@postChangePassword');

    // Activate later
    Route::group(['before' => 'notActivated'], function()
    {
    	Route::get('activate', 			['as' => 'account.activate', 			'uses' => 'AccountController@activate']);
    	Route::get('resendcode', 		['as' => 'account.resendcode', 			'uses' => 'AccountController@resendcode']);
    });

});

/*
|--------------------------------------------------------------------------
| Activate
|--------------------------------------------------------------------------
| 
| 
| 
*/
Route::group(['prefix' => 'activate', 'before' => 'notActivated'], function()
{
	Route::get('/', 						['as' => 'activate', 		'uses' => 'ActivateController@index']);
	Route::get('resent', 					['as' => 'activate.resent', 'uses' => 'ActivateController@resent']);
	Route::get('error', 					['as' => 'activate.fail', 	'uses' => 'ActivateController@fail']);
    Route::get('with/{code?}/{email?}', 	['as' => 'activating', 		'uses' => 'ActivateController@activating']);
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
Route::post('login',            ['before' => 'guest',			'as' => 'session.store', 		'uses' => 'SessionController@store'] );
Route::get('logout',         	['as' => 'session.destroy',		'uses' => 'SessionController@destroy'] );


/*==========  Come on in (login or signup)  ==========*/
Route::get('comeonin',			['before' => 'guest', 		'as' => 'comeonin', 	'uses' => 'HomeController@comeonin'] );
