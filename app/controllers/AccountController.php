<?php

/*
|--------------------------------------------------------------------------
| Account Controller
|--------------------------------------------------------------------------
| 
| - anything related to account
|
| TODO:
| - implement repo
| 
*/
use Spring\Repositories\UserInterface;
use Spring\Inventories\UserInventory;

class AccountController extends AuthorisedController {

  // public function __construct(Manager $manager)
  // {
  //   $this->manager = $manager;
  // }

  protected $user_repository;
  protected $user_inventory;

  public function __construct(UserInterface $user_repository, UserInventory $user_inventory)
  {
    parent::__construct();
    
    $this->user_repository = $user_repository;
    $this->user_inventory = $user_inventory;
  }

  /**
   * Display the form to allow a user to log in
   *
   * @return View
   */
  public function index()
  {
    return View::make('frontend.account.index');
  }


  /*
  |--------------------------------------------------------------------------
  | Edit Account
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function edit()
  {
    return View::make('frontend.account.edit');
  }

  public function update()
  {

    $SpringApp = \App::make('SpringApp');

    $user = $this->user_inventory->update( array_merge(['id' => $SpringApp->user->id], Input::all()) );

    if(! $user) return Redirect::route('account.edit')->withInput()->withErrors($this->user_inventory->errors());

    return Redirect::route('account.index')->with('success', 'Your account has been updated!');
  }

  /*
  |--------------------------------------------------------------------------
  | Activate (later)
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function activate()
  {
    return View::make('frontend.account.activate');
  }
  public function resendcode()
  {
    $user = \App::make('SpringApp')->user;
    // activation needed. 
    Event::fire('user.activate', [$user]);
    return Redirect::route('activate.resent');
  }

  /*
  |--------------------------------------------------------------------------
  | Change Password
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function getChangePassword()
  {
    return View::make('frontend.account.change-password');
  }

  public function postChangePassword()
  {
    $SpringApp = \App::make('SpringApp');

    $user = $this->user_inventory->changepassword( array_merge(['id' => $SpringApp->user->id], Input::all()) );

    if(! $user) return Redirect::back()->withInput()->withErrors($this->user_inventory->errors());

    return Redirect::back()->with('success', 'Your password has been changed!');
  }


}