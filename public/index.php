<?php
require_once "../vendor/autoload.php";

session_start();

// Vistas
use Philo\Blade\Blade;

$views = '../src/views';
$cache = '../cache';

$blade = new Blade($views, $cache);

// Router system
$router = new AltoRouter();

// List of routes

$router->map('GET', '/login', 'login.login');
$router->map('POST', '/login', 'loginController#login');
$router->map('GET', '/logout', 'loginController#logout');

//Routes of users
$router->map('GET', '/', 'home');
$router->map('GET', '/user', 'userController#index');
$router->map('GET', '/user/[i:id]', 'userController#show');
if(isset($_SESSION['name']))
{
  $router->map('GET', '/user/create', 'user/create');
  $router->map('POST', '/user/create', 'userController#store');
  $router->map('GET', '/user/[i:id]/edit', 'userController#edit');
  $router->map('PUT', '/user/[i:id]', 'userController#update');
  $router->map('DELETE', '/user/[i:id]', 'userController#destroy');
}

//Routes of parties
$router->map('GET', '/party', 'partyController#index');
$router->map('GET', '/party/[i:id]', 'partyController#show');
if(isset($_SESSION['name']))
{
$router->map('GET', '/party/create', 'partyController#create');
$router->map('POST', '/party/create', 'partyController#store');
$router->map('GET', '/party/[i:id]/edit', 'partyController#edit');
$router->map('PUT', '/party/[i:id]', 'partyController#update');
$router->map('DELETE', '/party/[i:id]', 'partyController#destroy');
}

// Change method PUT y DELETE
if(isset($_POST['_METHOD'])){
  $_SERVER['REQUEST_METHOD'] = $_POST['_METHOD'];
}

// End of list


$match = $router->match();
if($match) {
  $target = $match["target"];
  if(is_string($target) && strpos($target, "#") !== false) {
      list($controller, $action) = explode("#", $target);
      $controller = "Dsw\\Ifriend\controllers\\" . $controller;
      $controller = new $controller;
      $controller->$action($match["params"]);
  } else {
      if(is_callable($match["target"])) call_user_func_array($match["target"], $match["params"]);
      else
        echo $blade->view()->make($match['target'])->render();
  }
} else {
  echo "Ruta no válida";
  die();
}