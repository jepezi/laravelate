<?php namespace Spring\Validators\Validator;

use Spring\Validators\Validable;
use Spring\Validators\LaravelValidator;

class UserCreateValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'email' => 'required|email|unique:users',
    'password' => 'required|min:6',
    'first_name' => 'required',
    'last_name' => 'required'
  ];

  protected $messages = [
    'email.email' => 'Email you entered seems to be wrong email format. Please try again.',
    'password.min' => 'Password has to be at least 6 characters.'
  ];


  /*==========  how to use 'name' filter and {placeholder} for update rule  ==========*/
  
  // protected $rules = [
  //   'name' => 'required|alpha|name|unique:cribbbs,name,{id}',
  // ];

}