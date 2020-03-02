<?php

use Blog\view\klimansland\OutputDummy;
use HEF\controller\HTMLSerializer;


$loader= require __DIR__ . '/../../vendor/autoload.php';

new App;


class App
{
  public function __construct()
  {
    $x = 0;
    $y = (new OutputDummy())->get();
    echo (
    new HTMLSerializer(
        (new OutputDummy())->get()
    )
    )->compile();
  }
}
