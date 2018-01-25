<?php

/**
* View
*/
class View
{
  private $_layout;
  
  function __construct()
  {
    $this->layout = new stdClass();
  }

  public function render($file) {
    $this->layout->content = $this->renderPartial($file);
    return $this->_layout = $this->renderPartial('views/layout.tpl.php');
  }

  public function renderPartial($file) {
    # Start output buffer
    ob_start();

    # Render template
    require_once $file;

    # Get result
    $result = ob_get_contents();

    # Clean buffer
    ob_end_clean();
    return $result;
  }
}