<?php



/*==========  Home  ==========*/
Route::get( '/', 			['as' => 'home', 		'uses' => 'HomeController@index'] );

Route::post('signup', 		['as' => 'signup', 		'uses' => 'AuthController@store'] );

/*
|--------------------------------------------------------------------------
| Account
|--------------------------------------------------------------------------
| 
| edit or do anything with account
| 
*/
Route::group(['prefix' => 'account',	'before' => 'auth'], function()
{

        # Account Dashboard
        Route::get('/', 		['as' => 'account.index', 			'uses' => 'AccountController@index'] );
        
        # Complete account after newly signup
        Route::get('complete', 		['as' => 'account.complete', 			'uses' => 'AccountController@complete'] );
        Route::put('complete', 		'AccountController@updateComplete' );

        # Edit account
        Route::get('edit', 		['as' => 'account.edit', 			'uses' => 'AccountController@edit'] );
        Route::put('edit', 		'AccountController@update' );

        # Change Password
        // Route::get('change-password', array('as' => 'change-password', 'uses' => 'ChangePasswordController@getIndex'));
        // Route::post('change-password', 'ChangePasswordController@postIndex');

        # Change Email
        // Route::get('change-email', array('as' => 'change-email', 'uses' => 'ChangeEmailController@getIndex'));
        // Route::post('change-email', 'ChangeEmailController@postIndex');

});

/**
 * Authentication
 *
 * Allow a user to log in and log out of the application
 */
// disble login page in favor of comeonin
// Route::get('login',             ['uses' => 'SessionController@create',    'as' => 'session.create']); 
Route::get('login/{provider}',  ['uses' => 'SessionController@authorise', 	'as' => 'session.authorise']);
Route::post('login',            ['uses' => 'SessionController@store',     	'as' => 'session.store']);
Route::get('logout',         	['uses' => 'SessionController@destroy',   	'as' => 'session.destroy']);


/*==========  Come on in (login or signup)  ==========*/
Route::get('comeonin',			['before' => 'guest', 		'as' => 'comeonin', 	'uses' => 'HomeController@comeonin'] );
