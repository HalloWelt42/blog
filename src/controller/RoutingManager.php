<?php


namespace Blog\controller;


use Blog\view\example\OutputDummy;
use Blog\view\pages\StartPage;

class RoutingManager
{

  private $routes;

  public function __construct()
  {

    $this->routes[''] = function () {
      echo new StartPage();
    };

    $this->routes['master.css'] = function () {
      header('Content-Type: text/css');
      echo file_get_contents(__DIR__ . '/../view/css/master.css');
    };




    switch (($_GET['ext'] ?? '')) {
      case 'css' :
        $this->routes[($_GET['res'] ?? '')]();
        break;
      case 'php' :
        $this->routes[($_GET['url'] ?? '')]();
        break;
      case 'png' :
        header('Content-Type: image/png');
        echo file_get_contents(__DIR__ . "/../view/images/{$_GET['res']}");
    }

  }


}