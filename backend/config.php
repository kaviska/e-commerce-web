<?php
// server config
define("ROOT", "http://localhost:9001/");
define("SESSION_VARIABLE_ADMIN", "alg001_admin");
define("SESSION_VARIABLE_USER", "alg001_user");

// database config
define("DB_SERVER", "localhost");
define("DB_USERNAME", "root");
define("DB_PASSWORD", "KaviskaDilshan12#$");
define("DB_DATABASE", "e-commerce-web");

//constants
// error messages
define("API_404_MESSAGE", "Invalid API URL");
define("INVALID_REQUEST_METHOD", "Invalid request method");

// frontend config
require_once(__DIR__ . "/../public/config.php");
