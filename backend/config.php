<?php
// server config
define("ROOT", "http://localhost:9001/");
define("SESSION_VARIABLE_ADMIN", "alg009_admin");
define("SESSION_VARIABLE_USER", "alg009_user");
//Add Your Secret Strip Api key here
define("API_KEY","sk_test_51P9pPhFsAJwfAbwFcliPUIoCVJGoGiELXz9cgMVbqEtsjR8tKJ1plJhgQQCHEQizCCBHfkzUR5gn1q8JDGGl0l9w000tG03dDd");



// database config
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "KaviskaDilshan12#$");
define("DB_DATABASE", "e-commerce-001");
// define("DB_USERNAME", "u178904104_fortxcore");
// define("DB_PASSWORD", "Portxcore12#");
// define("DB_DATABASE", "u178904104_meetngreet");

//constants
global $IS_RESPONSE_TEXT;
$IS_RESPONSE_TEXT = false;

// error messages
define("API_404_MESSAGE", "Invalid API URL");
define("INVALID_REQUEST_METHOD", "Invalid request method");

// frontend config
require_once(__DIR__ . "/../public/config.php");
