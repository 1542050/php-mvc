<?php

/**
* Response
*/
require_once 'View.php';

class Response {
  private $_view = '';
  
  function __construct()
  {
    $this->_view = new View();
  }

  public function render($file) {
    return $this->_view->render($file);
  }

  public function getView() {
    return $this->_view;
  }
}