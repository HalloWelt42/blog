<?php


namespace Blog\controller;


use Blog\view\example\OutputDummy;
use Blog\view\pages\StartPage;

class RoutingManager
{

  public function __construct()
  {

    $routes['xxx'] = function (){
      echo new StartPage();
    };

    $routes['master.css'] = function (){
      header('Content-Type: text/css');
      echo file_get_contents(__DIR__.'/../view/css/master.css' );
    };


    $routes[$this->get_modul(($_GET['ext']??'') )]();
    $routes[($_GET['res']??'')]();

  }

  private function get_modul($ext ){
    switch ($ext){
      case 'css' : return ($_GET['res']??'');
      case 'php' : return ($_GET['url']??'');
    }
  }


}