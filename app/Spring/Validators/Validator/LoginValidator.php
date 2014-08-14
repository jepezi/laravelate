<?php namespace Spring\Validators\Validator;

use Spring\Validators\Validable;
use Spring\Validators\LaravelValidator;

class LoginValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'email_login' => 'required|email',
    'password_login' => 'required|min:6'
  ];

  protected $messages = [
    'email_login.email' => 'Email you entered seems to be wrong email format. Please try logging in again.',
    'password_login.min' => 'Password has to be at least 6 characters.'
  ];


  /*==========  how to use 'name' filter and {placeholder} for update rule  ==========*/
  
  // protected $rules = [
  //   'name' => 'required|alpha|name|unique:cribbbs,name,{id}',
  // ];

}