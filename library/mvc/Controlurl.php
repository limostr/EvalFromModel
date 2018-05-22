<?php

/**
 * Created by PhpStorm.
 * User: username
 * Date: 10/07/2017
 * Time: 21:15
 */
 namespace library\mvc;
use library\mvc\Application;

abstract class Controlurl
{

    static public $_class;
    static public $_method;
    static private $data;

     static public function dispatch($class,$method){
         try{

             $loadobj=new $class;//__autoload()
             $loadobj->{$method}();
         }catch (\Exception $e){
             die($e->getMessage());

         }

    }

    static  public function view($class,$method,$data=array()){
        self::$data=$data;
        include_once dirname(__FILE__)."/../../blocapp/modules/".Application::$Module."/views/".$class."/".$method.".phtml";
    }

    static public function form($formname,$data=array()){
        self::$data=$data;
        include_once dirname(__FILE__)."/../../blocapp/modules/".Application::$Module."/Forms/".$formname.".php";
    }

}