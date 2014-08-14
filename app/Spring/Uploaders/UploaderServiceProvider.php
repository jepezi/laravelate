<?php namespace Spring\Uploaders;

use Illuminate\Support\ServiceProvider;
use Spring\Validators\Validator\ImageValidator;

class UploaderServiceProvider extends ServiceProvider {

  /**
   * Boot the Registrator Events
   *
   * @return void
   */
  public function boot()
  {
    
  }

  /**
   * Register the binding
   *
   * @return void
   */
  public function register()
  {
    $this->registerImageUploader();
  }


  public function registerImageUploader()
  {
    $this->app->bind('Spring\Uploaders\ImageUploader', function($app)
    {
      $uploader = new ImageUploader;
      $uploader->registerValidator( 'image' , new ImageValidator($app['validator']) );
      
      return $uploader;
    });
  }


}