<?php


namespace Blog\controller;


use Blog\view\example\OutputDummy;
use Blog\view\pages\StartPage;

class RoutingManager
{

  public function __construct()
  {

    $routes[''] = function (){
      echo new StartPage();
    };

    $routes['master.css'] = function (){
      header("Content-Type: text/css");
      echo file_get_contents(__DIR__.'/../view/css/master.css' );
    };

    $routes[($_GET['url']??'')]();

  }


}