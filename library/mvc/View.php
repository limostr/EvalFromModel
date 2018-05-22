<?php

namespace library\mvc;
use library\mvc\Application;
use library\mvc\layout;

class View {

    protected $variables=[];
    protected $CallerMethode;
    protected $CallerClass;
    protected $withlayout ;
    protected $layoutname ;



    public function __construct()
    {
        $trace = debug_backtrace();
     // echo "<pre>"; print_r($trace);echo "</pre>";
        if (isset($trace[1])) {             
            $c=$trace[1]['class'];
            $class=explode("\\",$trace[1]['class']);
            if(count($class)>1){
                $c=$class[count($class)-1];
            }

            $this->CallerClass=$c;
            $this->CallerMethode=$trace[1]['function'];
             // echo "<pre>called by {$trace[1]['class']} :: {$trace[1]['function']}</pre><br>";
        }
        $this->withlayout=true;
        $this->layoutname="layout";
    }
    public function disablelayout($layout=false){
        $this->withlayout=$layout;
    }

    public function setlayout($layoutname="layout"){
        $this->layoutname=$layoutname;
    }

    public function getCallerMethode(){
        return $this->CallerMethode;
    }

    public function getCallerClass(){
        return $this->CallerClass;
    }

    public function generate($is_layout_call=false)
    {

         if($this->withlayout && !$is_layout_call){

             $layout=new layout();
            $layout->setlayout($this->layoutname);
            $layout->generate($this);
        }else{
             if(!file_exists(dirname(__FILE__)."/../../gui/".Application::$Module."/Views/".$this->getCallerClass()."/".$this->getCallerMethode().".phtml")){

                throw new \Exception("Le fichier view n'existe pas pour ".$this->getCallerMethode()." de ". $this->getCallerClass());
                die();
            }

            include_once dirname(__FILE__)."/../../gui/".Application::$Module."/Views/".$this->getCallerClass()."/".$this->getCallerMethode().".phtml";
        }


    }

    public function __isset($name)
    {
        // TODO: Implement __isset() method.
        return isset($this->variables[$name]);
    }

    public function __get($name)
    {
        // TODO: Implement __get() method.
        if(!$this->__isset($name)){
            return;
        }
        return $this->variables[$name];

    }

    public function __set($name, $value)
    {
        // TODO: Implement __set() method.

        $this->variables[$name]=$value;

    }
}