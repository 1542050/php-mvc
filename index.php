<?php

# Define Application Path
define('APPLICATION_PATH', getcwd());

# Add require path
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/includes');
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/models');
set_include_path(get_include_path() . PATH_SEPARATOR . APPLICATION_PATH . '/views');

require_once 'Request.php';
require_once 'Response.php';
require_once 'Controller.php';

$controller = 'index';
$action = 'index';
if (isset($_SERVER['QUERY_STRING'])) {
  $query = $_SERVER['QUERY_STRING'];
  $query = str_replace('query=', '', $query);
  $query = explode('/', $query);
  if (isset($query[0]) && !empty($query[0])) {
    $controller = $query[0];
  }

  if (isset($query[1]) && !empty($query[1])) {
    $action = $query[1];
  }
}

$request = new Request($controller, $action);
$response = new Response();


# Load Controller Data
$controllerPath = 'controllers/' . $request->getController() . 'Controller.php';
if (file_exists($controllerPath)) {
  require_once $controllerPath;
  $controllerClass = $request->getController() . 'Controller';
  if (class_exists($controllerClass)) {
    $controller = new $controllerClass($request, $response);
    $action = $request->getAction() . 'Action';
    $actionClass = $request->getAction() . 'Action';
    if (method_exists($controller, $actionClass)) {
      $controller->$actionClass();
      $viewPath = 'views/' . $request->getController() . '/' . $request->getAction() . '.tpl.php';
      echo $controller->render($viewPath);
      exit;
    } else{
      echo 'Action method does not exists'; exit;
    }
    // $controllerIntance-
  } else {
    echo 'Controller Class Does not exists'; exit;
  }
} else {
  echo 'Controller File does not exists'; exit;
}