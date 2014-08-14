<?php

/*
|--------------------------------------------------------------------------
| Session Controller
|--------------------------------------------------------------------------
| 
| - login, logout, authorise for social re-login
| - still use Auth facade
|
| TODO:
| - implement repo
| 
*/
use Spring\Managers\AuthManager;

class SessionController extends BaseController {

  /**
   * The Provider Manager instance
   *
   * @param Cribbb\Authenticators\Manager
   */
  protected $manager;

  
  public function __construct(AuthManager $manager)
  {
    $this->manager = $manager;
  }


  /*
  |--------------------------------------------------------------------------
  | Login
  |--------------------------------------------------------------------------
  | 
  | Store session
  | 
  */
  public function store()
  {

    return $this->manager->attempt( $this, ['email_login' => Input::get('email_login') , 'password_login' => Input::get('password_login')] );

  }


  /*
  |--------------------------------------------------------------------------
  | Observer methods
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function userNotFound($errors)
  {
    return Redirect::route('comeonin')->withInput()
                                            ->withErrors($errors);
  }

  public function userLoggedin()
  {
    return Redirect::intended('/');
  }

  public function invalid($errors)
  {
    return Redirect::route('comeonin')->withInput()
                                            ->withErrors($errors);
  }


  /*
  |--------------------------------------------------------------------------
  | Logout
  |--------------------------------------------------------------------------
  | 
  | Destroy session
  | 
  */
  public function destroy()
  {

    Auth::logout();

    return Redirect::route('comeonin')->with('success', 'You have successfully logged out!');
  }

}