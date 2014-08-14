<?php namespace Spring\Uploaders;

use Str;
use Response;
use Image;
use File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class ImageUploader extends AbstractUploader {

  /**
   * An array of Validable classes
   *
   * @param array
   */
  protected $validators;


  public function __construct()
  {
    parent::__construct();
  }

  private function makeFilenameWithExtension($extension)
  {
    $extension = $extension === "jpeg" ? "jpg" : $extension;
    return sha1(time() . time()) . "." . $extension;
  }

  private function getFullPath($path)
  {
    return public_path($path);
  }

  private function getJsonResult($filename, $mime, $path)
  {
    return [
        'files' => [
            'name'    => $filename,
            'url'     => $path
          ]
      ];
  }

  private function getJsonErrorResult()
  {
    return [
        'files' => [
            'error'   => $this->errors()->first('file') . ' Please upload image file again.'
          ]
      ];
  }


  public function upload(UploadedFile $file, $path, $w, $h, $quality = 85)
  {

    if (! $this->isValid( 'image', ['file' => $file] ) )
    {
      return $this->getJsonErrorResult();
    }

    $mime       = $file->getMimeType();
    $extension  = $file->guessExtension();
    $filename   = $this->makeFilenameWithExtension( $extension );
    $fullpath   = $this->getFullPath($path) . '/' . $filename;
    $filepath   = $path . '/' . $filename;

    $success = Image::make($file->getRealPath())
                        ->fit($w, $h)
                        ->save($fullpath, $quality);

    if (! $success)
    {
      $this->errors->add('file', 'Cannot upload files.' );
      return $this->getJsonErrorResult();
    }

    return $this->getJsonResult($filename, $mime, $filepath);

  }

}