<?php
namespace Index;
session_start();
require_once __DIR__ . "/Configuration/config.php";
use Routes\Route;

$path = parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH);
$pathOptions = [
                "/department",
                "/location",
                "/category",
                "/logout",
                "/login",
                "/user/" , "/user"
              ];
              
//dyniamically creating callback names
if (in_array($path, $pathOptions)) {
  $trimmedPath = trim($path, '/');
  $className = ucfirst($trimmedPath);
  Route::route($path, "Routes\\" . $className . '\\' . $className . '::run');
  //expected format  'Routes\Location\\Location::run'
  exit();
}
