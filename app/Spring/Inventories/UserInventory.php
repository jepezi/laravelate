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

    if (! $this->isValid('create', $data))
    {
      return false;
    }

    return $this->repository->update($data);
  }

  
  public function create(array $data)
  {

    if (! $this->isValid('create', $data))
    {
      return false;
    }

    return $this->repository->create($data);
  }

}