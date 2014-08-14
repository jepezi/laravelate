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
  | Complete account info 
  |--------------------------------------------------------------------------
  | 
  | - Complete
  | - Complete Social
  | 
  */

  /*==========  Show complete form after created new account from OAuth Connect (authorise)  ==========*/
  public function completeSocial()
  {
    return View::make('frontend.account.completeSocial');
  }

  /*==========  Show complete form after fast signup   ==========*/
  public function complete()
  {
    return View::make('frontend.account.complete');
  }

  /*
  |--------------------------------------------------------------------------
  | Update Complete
  |--------------------------------------------------------------------------
  | 
  | Since we don't care what's in the Complete and Complete Social form, 
  | We update user info here.
  | This is last step of Signup flow.
  |
  | - We fire event here.
  |
  */
  public function updateComplete()
  {

    $SpringApp = \App::make('SpringApp');

    $user = $this->user_inventory->update( array_merge(['id' => $SpringApp->user->id], Input::all()) );

    if(! $user) return Redirect::back()->withInput()->withErrors($this->user_inventory->errors());

    // fire event for email, ...
    Event::fire('user.created', [$user]);

    return Redirect::route('home')->with('success', 'Your account has been created! You can edit your account information anytime. Enjoy!');
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