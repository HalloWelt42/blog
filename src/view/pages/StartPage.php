<?php


namespace Blog\view\pages;


use Blog\view\pages\template\NavBar;
use Blog\view\pages\template\NavBarEntry;
use HEF\controller\HTMLSerializer;
use HEF\model\attributes\globals\ClassType;
use HEF\model\attributes\globals\Id;
use HEF\model\attributes\Height;
use HEF\model\attributes\Href;
use HEF\model\attributes\Rel;
use HEF\model\attributes\Src;
use HEF\model\attributes\Width;
use HEF\model\HTMLContent;
use HEF\model\HTMLElement;
use HEF\model\HTMLElements;
use HEF\model\htmlelements\A;
use HEF\model\htmlelements\Body;
use HEF\model\htmlelements\Div;
use HEF\model\htmlelements\Head;
use HEF\model\htmlelements\Hr;
use HEF\model\htmlelements\Html;
use HEF\model\htmlelements\Img;
use HEF\model\htmlelements\Li;
use HEF\model\htmlelements\Link;
use HEF\model\htmlelements\Pre;
use HEF\model\htmlelements\Text;
use HEF\model\htmlelements\Title;
use HEF\model\htmlelements\Ul;

class StartPage
{

  /**
   * @var HTMLElement
   */
  private $head_container, $navigation;

  public function __construct()
  {

    $import_nav = json_decode(
        file_get_contents(__DIR__.'/start_page.json'),true
    )['head-nav']['left'];

    $nav = (new NavBar())->import_entries($import_nav );


    $this->head_container = (new Div())
        ->set_class(new ClassType('head-container'))
        ->add_htmlelement((new Div())
            ->set_class(new ClassType('img-container'))
            ->add_htmlelement((new Div())
                ->set_class(new ClassType('img-wrapper'))
                ->add_htmlelement((new Img())
                    ->set_width(new Width('350'))
                    ->set_height(new Height('150'))
                    ->set_src(new Src('350x150.png'))
                )
            )
        )
        ->add_htmlelement((new Div())
            ->set_class(new ClassType('text-container'))
            ->add_htmlelement((new Div())
                ->set_class(new ClassType('blog-name'))
                ->add_htmlelement((new Text(new HTMLContent('MyBlog'))))
            )
            ->add_htmlelement((new Div())
                ->set_class(new ClassType('blog-description'))
                ->add_htmlelement((new Text(new HTMLContent('Der neue Blog'))))
            )

        );



    $this->navigation = (new Div())
        ->set_class(new ClassType('head-nav-container'))
        ->add_htmlelement((new Div())
            ->set_class(new ClassType('head-nav-left'))
            ->add_htmlelement($nav->get() )
        )
        ->add_htmlelement((new Div())
            ->set_class(new ClassType('head-nav-right'))
            ->add_htmlelement((new Ul())
                ->add_htmlelement((new Li())
                    ->add_htmlelement((new A())->set_href(new Href('login'))
                        ->add_htmlelement((new Text(new HTMLContent('LOGIN'))))
                    )
                )
            )
        );


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
                    ->set_rel(new Rel(Rel::STYLESHEET))
                    ->set_href(new Href('master.css'))
                )
            )
            ->add_htmlelement((new Body())
                ->add_htmlelement($this->head_container)
                ->add_htmlelement((new Hr()))
                ->add_htmlelement($this->navigation)
                ->add_htmlelement((new Hr()))
            )
        ))->compile();
  }


}