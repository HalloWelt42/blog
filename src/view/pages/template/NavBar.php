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


  public function importEntries($json ){
    foreach ( $json as $entry ) {
      $this->addEntry(new NavBarEntry($entry['label'], $entry['url']));
    }
    return $this;
  }

  public function addEntry(NavBarEntry $entry)
  {
    $this->entries->addElement((new Li)
        ->addElement((new A)
            ->sHref($entry->gHref())
            ->addElement(
                $entry->gLabel()
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