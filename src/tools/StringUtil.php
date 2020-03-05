<?php


namespace Blog\tools;


class StringUtil
{

  /**
   * @var string
   */
  private $str;

  /**
   * StringUtil constructor.
   * @param string $str
   */
  public function __construct(string $str = '')
  {
    $this->str = $str;
  }

  /**
   * @param string $str
   * @return $this
   */
  public function set(string $str)
  {
    $this->str = $str;
    return $this;
  }



}