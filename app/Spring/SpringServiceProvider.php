<?php namespace Spring;

use Illuminate\Support\ServiceProvider;

class SpringServiceProvider extends ServiceProvider 
{

  public function register()
  {
    $this->registerSpring();
  }

  /*
  |--------------------------------------------------------------------------
  | User
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function registerSpring()
  {

    $app = $this->app;
    
    /*==========  singleton  ==========*/
    $app->singleton('SpringApp', function($app)
    {

      $singleton = new \stdClass;
      $singleton->title = "SpringApp";

      if (\Auth::check())
      {
          $singleton->user = \Auth::user();
          $singleton->loggedin = true;
      }
      else
      {
          $singleton->loggedin = false;
          $singleton->user = false;
      }

      return $singleton;

    });

    /*==========  Before hook  ==========*/
    $app->before(function ($request, $response) {
        $SpringApp = \App::make('SpringApp');
        \View::share('app', $SpringApp);
    });

  }



}