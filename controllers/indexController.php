<?php

/**
* 
*/
class indexController extends Controller {
  public function indexAction() {
    $this->_view->layout->title = 'Basic MVC';
    $this->_view->newData = 'Data1';
  }
  
}