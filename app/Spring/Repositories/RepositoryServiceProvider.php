<?php namespace Spring\Repositories;

use Illuminate\Support\ServiceProvider;

//model
use User;
//repo
use Spring\Repositories\Eloquent\UserRepository;
//inventory
use Spring\Inventories\UserInventory;
// validator
use Spring\Validators\Validator\UserCreateValidator;
use Spring\Validators\Validator\UserUpdateValidator;
use Spring\Validators\Validator\UserChangePasswordValidator;
// event handlers
use Spring\Events\UserEventHandler;

class RepositoryServiceProvider extends ServiceProvider
{

  public function boot()
  {

    $this->app->events->subscribe(new UserEventHandler);

  }

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

      //cache

      return $repository;

    });


    /*==========  Inventory  ==========*/
    $this->app->bind('Spring\Inventories\UserInventory', function($app)
    {

      $inventory = new UserInventory( $app->make('Spring\Repositories\UserInterface') );
      $inventory->registerValidator( 'create' , new UserCreateValidator($app['validator']) );
      $inventory->registerValidator( 'update', new UserUpdateValidator($app['validator']) );
      $inventory->registerValidator( 'changepassword', new UserChangePasswordValidator($app['validator']) );
      
      return $inventory;

    });
  }



}