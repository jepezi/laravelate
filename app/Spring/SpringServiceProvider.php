<?php namespace Spring;

use Illuminate\Support\ServiceProvider;

class SpringServiceProvider extends ServiceProvider 
{

  public function boot()
  {
    require __DIR__ . '/form_macros.php';

    \Event::listen('auth.login', function($user) {
        $user->last_login = new \DateTime;

        $user->save();
    });
  }

  public function register()
  {
    $this->registerErrorsHandlers();
    $this->registerSpringApp();
  }

  /*
  |--------------------------------------------------------------------------
  | Error Handlers
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function registerErrorsHandlers()
  {
    $this->app->error(function($exception, $code)
    {
        switch ($code)
        {
            case 401:
                return \Response::view('errors.401', array(), 401);

            case 403:
                return \Response::view('errors.403', array(), 403);

            case 404:
                return \Response::view('errors.404', array(), 404);

            case 500:
                return \Response::view('errors.500', array(), 500);

            default:
                return \Response::view('errors.default', array(), $code);
        }
    });
  }

  /*
  |--------------------------------------------------------------------------
  | User
  |--------------------------------------------------------------------------
  | 
  | 
  | 
  */
  public function registerSpringApp()
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