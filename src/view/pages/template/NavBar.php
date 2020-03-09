<?php


namespace Blog\view\pages\template;

use HEF\model\HTMLElement;
use HEF\model\htmlelements\A;
use HEF\model\htmlelements\Li;
use HEF\model\htmlelements\Ul;

class NavBar
{

  /**
   * @var HTMLElement
   */
  private $entries;

  public function __construct()
  {
    $this->entries = (new Ul());
  }


  public function import_entries( $json ){
    foreach ( $json as $entry ) {
      $this->add_entry(new NavBarEntry($entry['label'], $entry['url']));
    }
    return $this;
  }

  public function add_entry(NavBarEntry $entry)
  {
    $this->entries->add_htmlelement((new Li)
        ->add_htmlelement((new A)
            ->set_href($entry->get_href())
            ->add_htmlelement(
                $entry->get_label()
            )

        )
    );
    return $this;
  }

  /**
   * @return HTMLElement
   */
  public function get()
  {
    return $this->entries;
  }

}