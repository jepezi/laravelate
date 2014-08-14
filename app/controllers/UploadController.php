<?php

use Spring\Uploaders\ImageUploader;

class UploadController extends BaseAjaxController {

    public function __construct(ImageUploader $uploader)
    {
        parent::__construct();

        $this->uploader = $uploader;
    }


    public function uploadAndSaveAvatar()
    {

        if(Input::hasFile('file')){

            // validate, upload and return json for blueimp fileupload
            $result = $this->uploader->upload(Input::file('file'), '/uploads/avatar', 240, 240);

            // if no errors, update user's avatar now!
            if (empty(array_get($result, 'files.error')) )
            {
                $user = \App::make('SpringApp')->user;
                $user->avatar = array_get($result, 'files.url');
                $user->save();
            }

            return $result;
        }
    }

}