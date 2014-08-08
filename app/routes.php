<?php



/*==========  Home  ==========*/
Route::get( '/', 			['as' => 'home', 		'uses' => 'HomeController@index'] );

Route::post('signup', 		['as' => 'signup', 		'uses' => 'AuthController@postSignup'] );

/**
 * Authentication
 *
 * Allow a user to log in and log out of the application
 */
// disble login page in favor of comeonin
// Route::get('login',             ['uses' => 'SessionController@create',    'as' => 'session.create']); 
Route::get('login/{provider}',  ['uses' => 'SessionController@authorise', 'as' => 'session.authorise']);
Route::post('login',            ['uses' => 'SessionController@store',     'as' => 'session.store']);
Route::get('logout',         ['uses' => 'SessionController@destroy',   'as' => 'session.destroy']);


/*==========  Come on in (login or signup)  ==========*/
Route::get('comeonin',		['as' => 'comeonin', 	'uses' => 'HomeController@comeonin'] );
