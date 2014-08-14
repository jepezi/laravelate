<?php

class BaseAjaxController extends AuthorisedController {

        /**
         * Whitelisted auth routes.
         *
         * @var array
         */
        protected $whitelist = array();

        /**
         * Initializer.
         *
         * @return void
         */
        public function __construct()
        {
                // Apply the auth filter
                $this->beforeFilter('ajax', array('except' => $this->whitelist));

                // Call parent
                parent::__construct();
        }

}