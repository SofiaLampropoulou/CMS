<?php

class Template{
    private $layout;
    //protected $insideAndChildren;
    //public $accessibleFromEverywhere;
    public function __construct($layout)
    {
        $this->layout = $layout;
    }
    function view($template,$variables){ 
         extract($variables);
         include VIEW_PATH . 'layout/' . $this->layout . '.html';
     

    } 
}