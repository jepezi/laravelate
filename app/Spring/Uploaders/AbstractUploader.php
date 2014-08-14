<?php namespace Spring\Uploaders;

use Exception;
use Illuminate\Support\MessageBag;

abstract class AbstractUploader {

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

  /**
   * Register Validators
   *
   * @param string $name
   * @param Validible $validator
   */
  public function registerValidator($name, $validator)
  {
    $this->validators[$name] = $validator;
  }

  /**
   * Check to see if the input data is valid
   *
   * @param array $data
   * @return boolean
   */
  public function isValid($name, array $data)
  {

    if( $this->validators[$name]->with($data)->passes() )
    {
      return true;
    }

    $this->errors = $this->validators[$name]->errors();
    return false;
  }


  /**
   * Return the errors MessageBag
   *
   * @return Illuminate\Support\MessageBag
   */
  public function errors()
  {
    return $this->errors;
  }

}