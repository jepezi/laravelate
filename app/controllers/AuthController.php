<?php

use Spring\Repositories\UserInterface;
use Spring\Inventories\UserInventory;

class AuthController extends BaseController {

	protected $repository;

	public function __construct(UserInterface $repository, UserInventory $inventory)
	{
		// $this->beforeFilter('auth');
		$this->repository = $repository;
		$this->inventory = $inventory;
	}

	public function postSignup()
    {
    	$user = $this->inventory->create(Input::all());

    	if(! $user) return Redirect::back()->withInput()->withErrors($this->inventory->errors());

    	Auth::login($user, true);

    	return Redirect::route('home');
    }

	

	public function index()
	{
		
	}


}
