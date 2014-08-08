<?php

use Spring\Repositories\UserInterface;
use Spring\Inventories\UserInventory;

class AuthController extends BaseController {

	protected $user_repository;

	public function __construct(UserInterface $user_repository, UserInventory $user_inventory)
	{
		// $this->beforeFilter('auth');
		$this->user_repository = $user_repository;
		$this->user_inventory = $user_inventory;
	}

	public function store()
    {
    	$user = $this->user_inventory->create(Input::all());

    	if(! $user) return Redirect::back()->withInput()->withErrors($this->user_inventory->errors());

    	Auth::login($user, true);

    	return Redirect::route('home');
    }

	

	public function index()
	{
		
	}


}
