<?php


namespace Blog\view\klimansland;


use HEF\model\HTMLContent;
use HEF\model\htmlelements\Body;
use HEF\model\htmlelements\Head;
use HEF\model\htmlelements\Html;
use HEF\model\htmlelements\Pre;
use HEF\model\htmlelements\Text;
use HEF\model\htmlelements\Title;

class OutputDummy
{

  /**
   * @return Html
   */
 public function get(){
   return (new Html())
       ->add_htmlelement((new Head())

           ->add_htmlelement((new Title())
               ->add_htmlelement((new Text(new HTMLContent('MyBlog'))))
           )

           ->add_htmlelement((new Body())
               ->add_htmlelement((new Pre())
                   ->add_htmlelement(new Text(new HTMLContent(
                       print_r($_SERVER, 1)
                   )))
               )
           )
       );
 }

}