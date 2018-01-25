<?php

/**
* Request
*/
class Request {
  private $_controller;

  private $_action;

  
  function __construct($controller = 'index', $action = 'index') {
    $this->_controller = $controller;
    $this->_action = $action;
    
  }

  public function getController() {
    return $this->_controller;
  }

  public function getAction() {
    return $this->_action;
  }
}