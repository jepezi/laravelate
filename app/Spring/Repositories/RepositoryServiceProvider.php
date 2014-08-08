<?php namespace Spring\Repositories;

use Illuminate\Support\ServiceProvider;

//model
use User;
//repo
use Spring\Repositories\Eloquent\UserRepository;
//inventory
use Spring\Inventories\UserInventory;
// validator
use Spring\Inventories\Validators\UserCreateValidator;
use Spring\Inventories\Validators\UserUpdateValidator;

class RepositoryServiceProvider extends ServiceProvider 
{

  public function register()
  {
    $this->registerUserRepository();
  }

  /*
  |--------------------------------------------------------------------------
  | User
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function registerUserRepository()
  {
    
    /*==========  Repo  ==========*/
    $this->app->bind('Spring\Repositories\UserInterface', function($app)
    {

      $repository = new UserRepository( new User );
      // $repository->registerValidator('create', new UserCreateValidator($app['validator']));
      // $repository->registerValidator('update', new UserUpdateValidator($app['validator']));

      //cache

      return $repository;

    });


    /*==========  Inventory  ==========*/
    $this->app->bind('Spring\Inventories\UserInventory', function($app)
    {

      $inventory = new UserInventory( $app->make('Spring\Repositories\UserInterface') );
      $inventory->registerValidator( 'create' , new UserCreateValidator($app['validator']) );
      $inventory->registerValidator( 'update', new UserUpdateValidator($app['validator']) );
      
      return $inventory;

    });
  }



}