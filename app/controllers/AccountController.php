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

class AccountController extends BaseController {

  // public function __construct(Manager $manager)
  // {
  //   $this->manager = $manager;
  // }

  protected $user_repository;
  protected $user_inventory;

  public function __construct(UserInterface $user_repository, UserInventory $user_inventory)
  {
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

  }

  public function edit()
  {
    return View::make('frontend.account.edit');
  }

  public function complete()
  {
    return View::make('frontend.account.complete');
  }

  public function updateComplete()
  {

    $SpringApp = \App::make('SpringApp');

    $user = $this->user_inventory->update( array_merge(['id' => $SpringApp->user->id], Input::all()) );

    if(! $user) return Redirect::route('account.complete')->withInput()->withErrors($this->user_inventory->errors());

    return Redirect::route('home')->with('success', 'Your account has been created! You can edit your account information anytime. Enjoy!');
  }

  public function update()
  {

    $SpringApp = \App::make('SpringApp');

    $user = $this->user_inventory->update( array_merge(['id' => $SpringApp->user->id], Input::all()) );

    if(! $user) return Redirect::route('account.edit')->withInput()->withErrors($this->user_inventory->errors());

    return Redirect::route('account.edit')->with('success', 'Your account has been updated!');
  }

  /**
   * Accept the POST request and create a new session (login)
   *
   * @return Redirect
   */
  public function store()
  {

    if (Auth::attempt( ['email' => Input::get('email'), 'password' => Input::get('password')], true ))
    {
      return Redirect::intended('/');
    }

    return Redirect::route('comeonin')->withInput()
                                            ->with('error', 'Your email or password was incorrect, please try again!');
  }


  /**
   * Destroy an existing session
   *
   * @return Redirect
   */
  public function destroy()
  {

    Auth::logout();

    return Redirect::route('comeonin')->with('success', 'You have successfully logged out!');
  }

}