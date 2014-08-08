<?php namespace Spring\Inventories\Validators;

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
    'password' => 'required|min:6'
  ];


  /*==========  how to use 'name' filter and {placeholder} for update rule  ==========*/
  
  // protected $rules = [
  //   'name' => 'required|alpha|name|unique:cribbbs,name,{id}',
  // ];

}