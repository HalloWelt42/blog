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

    $nav = (new NavBar())->importEntries($import_nav );


    $this->head_container = (new Div())
        ->sClass(new ClassType('head-container'))
        ->addElement((new Div())
            ->sClass(new ClassType('img-container'))
            ->addElement((new Div())
                ->sClass(new ClassType('img-wrapper'))
                ->addElement((new Img())
                    ->sWidth(new Width('350'))
                    ->sHeight(new Height('150'))
                    ->sSrc(new Src('350x150.png'))
                )
            )
        )
        ->addElement((new Div())
            ->sClass(new ClassType('text-container'))
            ->addElement((new Div())
                ->sClass(new ClassType('blog-name'))
                ->addElement((new Text(new HTMLContent('MyBlog'))))
            )
            ->addElement((new Div())
                ->sClass(new ClassType('blog-description'))
                ->addElement((new Text(new HTMLContent('Der neue Blog'))))
            )

        );



    $this->navigation = (new Div())
        ->sClass(new ClassType('head-nav-container'))
        ->addElement((new Div())
            ->sClass(new ClassType('head-nav-left'))
            ->addElement($nav->get() )
        )
        ->addElement((new Div())
            ->sClass(new ClassType('head-nav-right'))
            ->addElement((new Ul())
                ->addElement((new Li())
                    ->addElement((new A())->sHref(new Href('login'))
                        ->addElement((new Text(new HTMLContent('LOGIN'))))
                    )
                )
            )
        );


  }


  public function __toString()
  {
    return
        (new HTMLSerializer((new Html())
            ->addElement((new Head())
                ->addElement((new Title())
                    ->addElement((new Text(new HTMLContent('MyBlog'))))
                )
                ->addElement((new Link())
                    ->sRel(new Rel(Rel::STYLESHEET))
                    ->sHref(new Href('master.css'))
                )
            )
            ->addElement((new Body())
                ->addElement($this->head_container)
                ->addElement((new Hr()))
                ->addElement($this->navigation)
                ->addElement((new Hr()))
            )
        ))->compile();
  }


}