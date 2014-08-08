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

class SessionController extends BaseController {

  /**
   * The Provider Manager instance
   *
   * @param Cribbb\Authenticators\Manager
   */
  protected $manager;

  
  // public function __construct(Manager $manager)
  // {
  //   $this->manager = $manager;
  // }

  /**
   * Display the form to allow a user to log in
   *
   * @return View
   */
  public function create()
  {
    // if (Auth::user())
    // {
    //   return Redirect::route('home.index');
    // }

    // $this->layout->title = "Sign in";
    // $this->layout->nest('content', 'session.create');
  }

  /**
   * Accept the POST request and create a new session
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
   * Authorise an authentication request
   *
   * @return Redirect
   */
  public function authorise($provider)
  {
    // try
    // {
    //   $provider = $this->manager->get($provider);

    //   $credentials = $provider->getTemporaryCredentials();

    //   Session::put('credentials', $credentials);
    //   Session::save();

    //   return $provider->authorize($credentials);
    // }

    // catch(Exception $e)
    // {
    //   return App::abort(404);
    // }
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