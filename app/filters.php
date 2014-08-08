<?php

/*
|--------------------------------------------------------------------------
| Application & Route Filters
|--------------------------------------------------------------------------
|
| Below you will find the "before" and "after" events for the application
| which may be used to do any work before or after a request into your
| application. Here you may also register your custom route filters.
|
*/

App::before(function($request)
{
	// delay 1s for ajax req in local mode
	if (Request::ajax())
	{
		if (App::environment('local')) {
	        sleep(1);
    	}
    }

});


App::after(function($request, $response)
{
	//
});

/*
|--------------------------------------------------------------------------
| Authentication Filters
|--------------------------------------------------------------------------
|
| The following filters are used to verify that the user of the current
| session is logged into this application. The "basic" filter easily
| integrates HTTP Basic authentication for quick, simple checking.
|
*/

Route::filter('auth', function()
{
	if (Auth::guest())
	{
		if (Request::ajax())
		{
			return Response::make('Unauthorized', 401);
		}
		else
		{
			return Redirect::guest('login');
		}
	}
});


Route::filter('auth.basic', function()
{
	return Auth::basic();
});

/*
|--------------------------------------------------------------------------
| Guest Filter
|--------------------------------------------------------------------------
|
| The "guest" filter is the counterpart of the authentication filters as
| it simply checks that the current user is not logged in. A redirect
| response will be issued if they are, which you may freely change.
|
*/

Route::filter('guest', function()
{
	if (Auth::check()) return Redirect::to('/')->with('success', 'You are already logged in!');
});

// ajax filter
Route::filter('ajax', function()
{
        // Check ajax req
        if ( ! Request::ajax())
        {
            App::abort(403);
        }
});

/*
|--------------------------------------------------------------------------
| CSRF Protection Filter
| - include ajax req
| - http://keltdockins.com/2013/09/18/laravel-4-csrf-token-and-ajax/
|--------------------------------------------------------------------------
|
| The CSRF filter is responsible for protecting your application against
| cross-site request forgery attacks. If this special token in a user
| session does not match the one given in this request, we'll bail.
|
| $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="csrf-token"]').attr('content')
    }
});
|
|
<head>
<meta name="csrf-token" content="<?= csrf_token() ?>">
|
|
|
*/
Route::filter('csrf', function()
{
    $token = Request::ajax() ? Request::header('x-csrf-token') : Input::get('_token');

    if (Session::token() != $token)
    {
        throw new Illuminate\Session\TokenMismatchException;
    }
});

