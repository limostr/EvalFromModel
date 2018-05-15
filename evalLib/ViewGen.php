<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 10/05/2018
 * Time: 13:50
 */

namespace evalLib;

use evalLib\CompEvaluation;
class ViewGen
{
        public $CompEval;
    private $_Model_Exp_Reg=array(
        "variable"=>"/(\{((@?|#?)[_A-Za-z0-9:]+)+\})/"
    );
        public function __construct(CompEvaluation &$CompEval)
        {
            $this->CompEval=$CompEval;

        }

        public function _InitValue(){

            if($this->CompEval->_Template){

                /**
                 *
                 */
                $Liste =$this->CompEval->_Template->getListe();
                foreach ($Liste as $key => $lg){
                    $type=$lg->getType();
                    switch($type){
                        case "EVAL":
                            $res=$this->evaluer($lg->getMallocForm());
                            $this->CompEval->_Template->setIn($key,"liste",$res);

                            break;
                        case "SET":
                            $res = $this->CompEval->lookForVariable($lg->getMallocForm());
                            $this->CompEval->_Template->setIn($key,"liste",$res);

                            break;
                        case "GET":
                            break;
                    }
                }

                /**
                 *
                 */

                $Ligne =$this->CompEval->_Template->getLigne();
                foreach ($Ligne as $key => $lg){
                    $type=$lg->getType();
                    switch($type){
                        case "EVAL":
                            $res=$this->evaluer($lg->getMallocForm());
                            $this->CompEval->_Template->setIn($key,"ligne",$res);

                            break;
                        case "SET":
                            $res = $this->CompEval->lookForVariable($lg->getMallocForm());
                            $this->CompEval->_Template->setIn($key,"ligne",$res);

                            break;
                        case "GET":
                            break;
                    }
                }



            }
        }

        public function evaluer($formuleEvaluated){
            echo $formuleEvaluated."<br>";
            $formule=$formuleEvaluated;
            while (preg_match($this->_Model_Exp_Reg['variable'],$formule,$matches)){
                if(isset($matches[0]) && !empty($matches[0])){
                    $UID=str_ireplace(array("}","{"),"",$matches[0]);
                    $var=$this->CompEval->lookForVariable($UID);
                    if(is_array($var)){
                        $var = implode(",",$var);
                    }
                    $formule=str_ireplace($matches[0],"$var",$formule);
                }

            }

            $use = "use evalLib\\MethodEval;";
            $res=null;
            eval("$use;\$res=$formule;");
            return $res;
        }

        public function genVue($VueTemplate){
            
        }

}