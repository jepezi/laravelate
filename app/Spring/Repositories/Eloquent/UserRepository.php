<?php namespace Spring\Repositories\Eloquent;

use Illuminate\Support\MessageBag;
use Illuminate\Database\Eloquent\Model;

use Spring\Repositories\UserInterface;

class UserRepository extends AbstractRepository implements UserInterface {

  /**
   * @var Model
   */
  protected $model;

  /**
   * Construct
   *
   * @param Illuminate\Database\Eloquent\Model $model
   */
  public function __construct(Model $model)
  {
    parent::__construct(new MessageBag);

    $this->model = $model;
  }


}