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

  /**
   * @return string
   */
  public function get_file_extention_name()
  {
    $pos = strrpos($this->str, '.');

    if ($pos === false) {
      return '';
    }

    $str = substr($this->str, ++$pos) ?: '';

    if( preg_match('/\W/',$str)){
      return '';
    }

    return $str;
  }

  public function get_file_name(){

  }

}