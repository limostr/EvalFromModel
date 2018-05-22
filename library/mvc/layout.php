<?php

/**
 * Created by PhpStorm.
 * User:qq
 * Date:
 * Time:
 */

namespace library\mvc;
use library\mvc\Application;

class layout
{
    protected $layoutname ;
    protected $view;
    public function __construct()
    {
        $this->layoutname="layout";
    }

    public function setlayout($layoutname="layout"){
        $this->layoutname=$layoutname;
    }
    public function generate(&$view)
    {
        $this->view=$view;
        if(!file_exists(dirname(__FILE__)."/../../view/layout/".$this->layoutname.".phtml")){
            throw new \Exception("Le fichier ".$this->layoutname." de calque de sortie n'existe pas pour ");
            die();
        }
        include_once dirname(__FILE__)."/../../view/layout/".$this->layoutname.".phtml";

    }
}