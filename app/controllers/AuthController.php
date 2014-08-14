<?php

use Spring\Repositories\UserInterface;
use Spring\Inventories\UserInventory;

class AuthController extends BaseController {

	protected $user_repository;
	protected $user_inventory;

	public function __construct(UserInterface $user_repository, UserInventory $user_inventory)
	{
		// $this->beforeFilter('auth');
		$this->user_repository = $user_repository;
		$this->user_inventory = $user_inventory;
	}

	/*==========  Signup  ==========*/
	public function store()
    {

    	return $this->user_inventory->create($this, Input::all());

    }

	

	public function index()
	{
		
	}

	/*
	|--------------------------------------------------------------------------
	| Social Authenticate
	|--------------------------------------------------------------------------
	| 
	| repo - check if member 
	| inventory - decide to auth (already member) or create new account (first time connect)
	| 
	*/

	public function authorise($provider)
	{
		$class = "League\OAuth2\Client\Provider\\" . $provider;

		$provider = new $class(array(
		    'clientId'  	=>  Config::get('auth.providers.' . $provider . '.identifier'),
		    'clientSecret'  =>  Config::get('auth.providers.' . $provider . '.secret'),
		    'redirectUri'   =>  Config::get('auth.providers.' . $provider . '.callback_uri'),
		));

		if (Input::has('code')) {
			$token = $provider->getAccessToken('authorization_code', [
				'code' => Input::get('code')
			]);

			// data from provider i.e. Facebook
			$user_data = $provider->getUserDetails($token);

			// is he a member? (finding uid in db)
			$auth = $this->user_repository->getFirstBy('uid', $user_data->uid);

			return $this->user_inventory->authOrCreate($this, $auth, $user_data, $token);
	        
		}

		return Redirect::to( $provider->getAuthorizationUrl() );

	}


	/*
	|--------------------------------------------------------------------------
	| Observer callback method from signup flow
	|--------------------------------------------------------------------------
	| 
	| Called from User Inventory
	| - userCreated : $fromSocial flag (bool) - true if create new user for first time after social oauth
	| 		false if coming from credential registration
	| 
	*/

	public function userAuthed($user)
	{
		Auth::login($user, true);
		return Redirect::intended('/');
	}

	/*==========  userCreated callback  ==========*/
	public function userCreated($user, $fromSocial)
	{

		Auth::login($user, true);

		if(! $fromSocial) return Redirect::route('account.complete');
		
		return Redirect::route('account.completeSocial');
	}

	/*==========  invalid - there was some validation error  ==========*/
	public function invalid($errors)
	{

		return Redirect::back()->withInput()->withErrors($errors);
	}


}
