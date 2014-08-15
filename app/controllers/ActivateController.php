<?php

use Spring\Repositories\UserInterface;

class ActivateController extends BaseController {

  protected $user_repository;

  public function __construct(UserInterface $user_repository)
  {
    parent::__construct();
    
    $this->user_repository = $user_repository;
  }

  // Display activate page
  public function index()
  {
    $SpringApp = \App::make('SpringApp');
    
    if (! $SpringApp->loggedin) App::abort(401);
    return View::make('frontend.activate.index');
  }

  public function resent()
  {
    $SpringApp = \App::make('SpringApp');
    
    if (! $SpringApp->loggedin) App::abort(401);
    return View::make('frontend.activate.resent');
  }

  // link from email -- 2 params
  // If matched, we save activated & activated_at attributes.
  public function activating($code = null, $email = null)
  {
    if (is_null($code) || is_null($email)) return Redirect::route('activate.fail')->with('error', Lang::get('activation.fail'));

    $user = $this->user_repository->getFirstBy('email', $email);

    if (! $user) return Redirect::route('activate.fail')->with('error', Lang::get('activation.fail'));

    if (! $user->activation_code === $code) return Redirect::route('activate.fail')->with('error', Lang::get('activation.fail'));
    
    $user->activated = true;
    $user->activated_at = new DateTime;
    
    $user->save();
    Auth::login($user, true);

    // user activated now. fire signedup event here to finish the flow.
    Event::fire('user.signedup', [$user]);
    return Redirect::route('home')->with('success', Lang::get('activation.success'));
  }

}