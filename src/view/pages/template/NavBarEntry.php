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
    $this->sLabel($text);
    $this->sHref($href);
  }

  public function sLabel($label): self
  {
    $this->label = (new Text(new HTMLContent($label)));
    return $this;
  }


  public function sHref($href): self
  {
    $this->href = new Href($href);
    return $this;
  }

  public function gHref(): Href
  {
    return $this->href;
  }

  public function gLabel(): Text
  {
    return $this->label;
  }

}