<?php namespace Spring\Managers;

use Exception;
use Illuminate\Support\MessageBag;
use Spring\Validators\Validator\LoginValidator;

class AuthManager {

  /**
   * The errors MesssageBag instance
   *
   * @var Illuminate\Support\MessageBag
   */
  protected $errors;

  /**
   * Create a new instance of Illuminate\Support\MessageBag
   * automatically when the child class is created
   *
   * @return void
   */
  public function __construct()
  {
    $this->errors = new MessageBag;
  }

  public function attempt($observer, array $data)
  {
    $v = new LoginValidator(\App::make('validator'));

    if(! $v->with($data)->passes() )
    {
      return $observer->invalid($v->errors());
    }

    // change the key to match model attributes
    $data['email'] = $data['email_login'];
    unset($data['email_login']);

    $data['password'] = $data['password_login'];
    unset($data['password_login']);

    if (\Auth::attempt( $data, true ) )
    {
      return $observer->userLoggedin();
    }

    return $observer->userNotFound($this->errors->add('password_login', 'It looks like either your password or email is incorrect.'));
  }

}