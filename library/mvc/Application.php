<?php
/**
 * Created by PhpStorm.
 * User: n.sayari
 * Date: 07/09/2017
 * Time: 13:12
 */

 namespace library\mvc;

 use library\mvc\Controlurl;

class  Application
{
    protected static $Instance;
    public static $Module="";
    public $test;
    protected $param;
    public function __construct()
    {
      /*  if(self::$Instance){
           return self::$Instance;
        }else{
            self::$Instance=$this;
        }*/
    }

    public function _getRequest($paramname,$default=""){

        return (isset($_REQUEST[$paramname]) && !empty($_REQUEST[$paramname]))  ? $_REQUEST[$paramname]: $default;

    }

    public function Run(){
        include dirname(__FILE__)."/../../config/routes.php";
        global $_Routes;
        $activity=$this->_getRequest("activity");
        try{

                if(isset($_Routes[$activity])){



                    $viewname=$_Routes[$activity]['Action'];
                    $Controllername=$_Routes[$activity]['Controller'];
                    $Module=$_Routes[$activity]['Module'];

                    self::$Module=$Module;
                    ///gestion des droits utilisateur
                    $hasrole=false;
                    if(isset($_Routes[$activity]['Roles']) && count($_Routes[$activity]['Roles'])>0){
                        @ session_start();

                        foreach($_Routes[$activity]['Roles'] as $role){
                            if($_SESSION['ROLE']==$role){
                                $hasrole=true;
                            }

                        }


                    } else{
                        $hasrole=true;
                    }

                    if(!$hasrole){
                        header('Location: index.php?activity=login');
                    }

                    if(!file_exists(dirname(__FILE__).'/../../gui/'.$Module.'/Controllers/'.$Controllername.'.php')){

                        throw new \Exception("Pas de Controlleur qui correspond à l'activity : $activity");
                        die();
                    }
                   ;


                    $Class = "gui\\$Module\Controllers\\$Controllername";
                    $loadobj=new $Class;//__autoload()

                    $loadobj->{$viewname}();

                }elseif(empty($activity)) {

                    if(!file_exists(dirname(__FILE__).'/../../gui/index/Controllers/index.php')){

                        throw new \Exception("Pas de Controlleur qui correspond à l'activity : index");
                        die();
                    }


                    $loadobj=new \gui\index\Controllers\index();//__autoload()
                    $loadobj->Acceuil();
                }else{
                     throw new \Exception("La fonctionaliter demander n'existe pas : $activity");
                     die();
                }
            }catch (\Exception $e){
                die($e->getMessage());
            }

        /*$viewname=$_GET['view'];
        $Controllername=$_GET['controller'];
        try{
            include_once dirname(__FILE__).'/../../blocapp/controllers/'.$Controllername.'.php';
             $loadobj=new $Controllername;//__autoload()
            $loadobj->{$viewname}();
        }catch (\Exception $e){
            die($e->getMessage());

        }*/
    }

}