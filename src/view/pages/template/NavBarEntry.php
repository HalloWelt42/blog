<?php


namespace Blog\view\pages\template;


use HEF\model\attributes\Href;
use HEF\model\HTMLContent;
use HEF\model\htmlelements\Text;

class NavBarEntry
{

  /**
   * @var Text
   */
  private $label;

  /**
   * @var Href
   */
  private $href;

  public function __construct($text, $href)
  {
    $this->set_label($text);
    $this->set_href($href);
  }

  public function set_label($label): self
  {
    $this->label = (new Text(new HTMLContent($label)));
    return $this;
  }


  public function set_href($href): self
  {
    $this->href = new Href($href);
    return $this;
  }

  public function get_href(): Href
  {
    return $this->href;
  }

  public function get_label(): Text
  {
    return $this->label;
  }

}