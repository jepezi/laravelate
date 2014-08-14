<?php namespace Spring\Validators\Validator;

use Spring\Validators\Validable;
use Spring\Validators\LaravelValidator;

class UserChangePasswordValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'current_password'  => 'required|between:3,32',
    'password'          => 'required|between:3,32',
  ];


  /*==========  how to use 'name' filter and {placeholder} for update rule  ==========*/
  
  // protected $rules = [
  //   'name' => 'required|alpha|name|unique:cribbbs,name,{id}',
  // ];

}