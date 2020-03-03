<?php
require __DIR__ .
    DIRECTORY_SEPARATOR . '..' .
    DIRECTORY_SEPARATOR . '..' .
    DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

use Blog\controller\RoutingManager;
use Blog\view\example\OutputDummy;


new App;


class App
{
  public function __construct()
  {

    #new RoutingManager();
    echo new OutputDummy;

  }
}
