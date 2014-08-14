<?php namespace Spring\Validators\Validator;

use Spring\Validators\Validable;
use Spring\Validators\LaravelValidator;

class ImageValidator extends LaravelValidator implements Validable {

  /**
   * Validation rules
   *
   * @var array
   */
  protected $rules = [
    'file' => 'image'
  ];

}