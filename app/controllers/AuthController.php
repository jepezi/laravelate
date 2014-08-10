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

	public function store()
    {

    	return $this->user_inventory->create($this, Input::all());

    }

	

	public function index()
	{
		
	}

	/*
	|--------------------------------------------------------------------------
	| Observer callback method
	|--------------------------------------------------------------------------
	| 
	| Called from User Inventory
	| 
	*/

	/*==========  userCreated callback  ==========*/
	public function userCreated($user)
	{

		Auth::login($user, true);
		
		return Redirect::route('account.complete');
	}

	/*==========  invalid - there was any validation error  ==========*/
	public function invalid($errors)
	{

		return Redirect::back()->withInput()->withErrors($errors);
	}


}
