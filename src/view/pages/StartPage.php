<?php


namespace Blog\view\pages;


use HEF\controller\HTMLSerializer;
use HEF\model\attributes\globals\ClassType;
use HEF\model\attributes\globals\Id;
use HEF\model\attributes\Href;
use HEF\model\attributes\Rel;
use HEF\model\HTMLContent;
use HEF\model\htmlelements\Body;
use HEF\model\htmlelements\Div;
use HEF\model\htmlelements\Head;
use HEF\model\htmlelements\Html;
use HEF\model\htmlelements\Link;
use HEF\model\htmlelements\Pre;
use HEF\model\htmlelements\Text;
use HEF\model\htmlelements\Title;

class StartPage
{

  /**
   * @var Div
   */
  private $head_container;

  public function __construct()
  {
    $this->head_container = (new Div(

    ))->set_class(new ClassType('head-container'));
  }


  public function __toString()
  {
    return
        (new HTMLSerializer((new Html())

            ->add_htmlelement((new Head())
                ->add_htmlelement((new Title())
                    ->add_htmlelement((new Text(new HTMLContent('MyBlog'))))
                )
                ->add_htmlelement((new Link())
                    ->set_rel(new Rel(Rel::STYLESHEET ))
                    ->set_href(new Href('master.css'))
                )
            )

            ->add_htmlelement((new Body())
                ->add_htmlelement($this->head_container

                )
            )
        ))->compile();  }


}