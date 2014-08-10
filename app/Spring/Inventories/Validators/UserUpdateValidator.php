<?php namespace Spring\Inventories\Validators;

use Spring\Validators\Validable;
use Spring\Validators\LaravelValidator;

class UserUpdateValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'email' => 'sometimes|required|email|unique:users,email,{id}',
    'first_name' => 'required',
    'last_name' => 'required',
    'message' => 'max: 150',
    'password' => 'sometimes|required|min:6',
    'website' => 'url',
    'twitter' => 'url'
  ];


  /*==========  how to use 'name' filter and {placeholder} for update rule  ==========*/
  
  // protected $rules = [
  //   'name' => 'required|alpha|name|unique:cribbbs,name,{id}',
  // ];

}