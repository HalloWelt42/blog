<?php

use PHPUnit\Framework\TestCase;

require __DIR__ .
    DIRECTORY_SEPARATOR . '..' .
    DIRECTORY_SEPARATOR . 'vendor' .
    DIRECTORY_SEPARATOR . 'autoload.php';

class StringUtil extends TestCase
{


  public function test_file_extention_name(){

    $this->assertEquals('css',$this->url('//style.css'));
    $this->assertEquals('css',$this->url('style.css'));
    $this->assertEquals('css',$this->url('.css'));
    $this->assertEquals('',$this->url('css'));
    $this->assertEquals('css',$this->url('/foo/bar/.css'));
    $this->assertEquals('css',$this->url('/bar/foo/baz.css'));
    $this->assertEquals('css',$this->url('//.css'));
    $this->assertEquals('',$this->url('//.css//foo'));
    $this->assertEquals('cdd',$this->url('//.css/..cdd'));
    $this->assertEquals('',$this->url('.....'));
    $this->assertEquals('',$this->url(''));
  }

  private function url( $str ){
    $str_util = new \Blog\tools\StringUtil();
    return $str_util->set($str )->get_file_extention_name();
  }

}