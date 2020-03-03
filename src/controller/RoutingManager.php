<?php


namespace Blog\controller;


class RoutingManager
{

  public function __construct()
  {

    print_r(
        ($_GET['url']??'')
    );

  }


}