<?php namespace Spring\Inventories;

use Illuminate\Support\Str;
use Spring\Repositories\UserInterface;

class UserInventory extends AbstractInventory implements Inventory {

  protected $repository;

  public function __construct(UserInterface $repository)
  {

    parent::__construct();

    $this->repository = $repository;

  }

  public function update(array $data)
  {

    if (! $this->isValid('update', $data))
    {
      return false;
    }

    return $this->repository->update($data);
  }
  /*
  |--------------------------------------------------------------------------
  | Create
  |--------------------------------------------------------------------------
  | 
  | observer is authcontroller passed from controller itself, 
  | notify back to controller for success or invalid data
  | 
  */
  public function create($observer, array $data)
  {

    if (! $this->isValid('create', $data))
    {
      // return false;
      return $observer->invalid($this->errors());
    }

    // return $this->repository->create($data);
    return $this->createValidModel($observer, $data);
  }

  private function createValidModel($observer, $data)
  {
    $model = $this->repository->create($data);

    if (! $model) return $observer->invalid(['error' => 'Unknown error. Please try again.']);

    return $observer->userCreated($model);
  }

}