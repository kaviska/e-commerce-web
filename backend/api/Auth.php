<?php

/**
 * @author : Author Name
 * @description : This file is an Example for developing an API
 */

// import statements
require_once __DIR__ . '/../router/Api.php';

class Auth extends Api
{
       public function __construct($apiPath)
       {
              //pares apiPath parent class constructor
              parent::__construct($apiPath);
              $this->init($this);
       }
       //data method
       protected function register()
       {

       }
}
