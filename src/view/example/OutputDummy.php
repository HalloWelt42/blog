<?php


namespace Blog\view\example;


use HEF\controller\HTMLSerializer;
use HEF\model\attributes\Href;
use HEF\model\attributes\Rel;
use HEF\model\HTMLContent;
use HEF\model\htmlelements\Body;
use HEF\model\htmlelements\Head;
use HEF\model\htmlelements\Html;
use HEF\model\htmlelements\Link;
use HEF\model\htmlelements\Pre;
use HEF\model\htmlelements\Text;
use HEF\model\htmlelements\Title;

class OutputDummy
{

  /**
   * @return string
   */
  public function __toString()
  {
    return
        (new HTMLSerializer((new Html())

            ->addElement((new Head())
                ->addElement((new Title())
                    ->addElement((new Text(new HTMLContent('MyBlog'))))
                )
                ->addElement((new Link())
                    ->sRel(new Rel(Rel::STYLESHEET ))
                    ->sHref(new Href('master.css'))
                )
            )

            ->addElement((new Body())
                ->addElement((new Pre())
                    ->addElement(new Text(new HTMLContent(
                        print_r($_GET, 1)
                    )))
                )
            )
        ))->compile();
  }

}