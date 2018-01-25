<?php

/**
* Controller
*/
class Controller {
  private $_request;

  private $_response;

  public $_view;
  
  
  function __construct($request, $response) {
    $this->_request = $request;
    $this->_response = $response;
    $this->_view = $response->getView();
  }


  public function render($file) {
    return $this->_response->render($file);
  }


}