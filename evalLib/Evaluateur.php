<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 08/05/2018
 * Time: 13:40
 */

namespace evalLib;
use evalLib\MetaRecords\RecordFormule;
use evalLib\MethodEval;

/**
 * Class Evaluateur
 * @package evalLib
 *
 *
 * ([A-Z]{3,})(\(\{@[a-zA-A0-9:_]{2,}\}\))
 *
 * detection variable           : (\(\{@[a-zA-A0-9:_]{2,}\}\))
 * detection function           : ([A-Z]{3,})
 * detection detection result   : ([a-zA-A0-9:_]+)
 *
 */
class Evaluateur
{
    private $CompEval;
    private $function="([A-Z]{3,})(\(\{@[A-Za-z0-9:]+\}\)|\(\{@[A-Za-z0-9:]+\},\d+\))";
    private $_Model_Exp_Reg=array(
        "function"=>"/([A-Z]{3,})(\(\{@[_A-Za-z0-9:]+\}\)|\(\{@[A-Za-z0-9:]+\},\d+\))/"
        ,"variable"=>"/(\{((@?|#?)[_A-Za-z0-9:]+)+\})/"
         ,"function2"=>"/([A-Z]{3,})()/"
        ,"functionOnly"=>"([A-Z]{3,})"
        ,"result"=>"([a-zA-A0-9:_]+)"
        ,"All"=>"([A-Z]{3,})(\(\{@[a-zA-A0-9:_]{2,}\}\))"
        );

    public function __construct(CompEvaluation $CompEval=null)
    {

        $this->CompEval=$CompEval;

    }

    public function Evaluation(CompEvaluation &$PComp=Null){

        if(!$PComp){
            $PComp=$this->CompEval;
        }

        if(isset($PComp->_SubComp) && is_array($PComp->_SubComp) && count($PComp->_SubComp)>0){

            foreach ($PComp->_SubComp as $key=>$cmp){
                $this->Evaluation($PComp->_SubComp[$key]);
            }

        }

        if(isset($PComp->_Model)){
            foreach ($PComp->_Model as $KeyModel => $FormuleModel){
                $Formules=$FormuleModel->getFormule();
                foreach ($Formules as $keyFormModel => $Formule){
                    $res=$this->detectFunction($Formule);
                }
            }

        }

        if(isset($PComp->_Formule)){
            foreach ($PComp->_Formule as $KeyFormule => $Formule){
                $res=$this->detectFunction($Formule);
             }

        }
        //print_r($res);
    }

    public function detectFunction(RecordFormule $formule){

        $_Has_Variable=preg_match($this->_Model_Exp_Reg['variable'],$formule->getToEval(),$matches);

        $formuleEvaluated=$formule->getToEval();
            while (preg_match($this->_Model_Exp_Reg['variable'],$formuleEvaluated,$matches)){
                 if(isset($matches[0]) && !empty($matches[0])){
                    $UID=str_ireplace(array("}","{"),"",$matches[0]);
                    $var=$this->CompEval->lookForVariable($UID);
                    if(is_array($var)){
                        $var = implode(",",$var);
                    }
                     $formuleEvaluated=str_ireplace($matches[0],"$var",$formuleEvaluated);
                 }

             }

        echo "<pre style='color: darkgoldenrod;'>";print_r($formuleEvaluated);echo"</pre>";

       $res = $this->evalfunction($formuleEvaluated,$formule);
       $formuleBind=$formule->getBind();

       foreach($formuleBind as $key => $val){
           $UID=str_ireplace(array("}","{"),"",$val);
           $this->CompEval->setIn($UID,$res);
       }

        echo "<pre style='color: red;font-size: large;'>$res</pre>";


        return $formule;
    }



    private function evalfunction($formuleEvaluated,RecordFormule $formule){
        $res = null;
        switch($formule->getType()){
            case 'arithmetique':
                $res=$this->evalArithmetiquefunction($formuleEvaluated, $formule);
            break;
            case 'logique':
                $res=$this->evalLogiqueFunction($formuleEvaluated, $formule);

            break;
            case 'mixed':
                $res=$this->evalMixFunction($formuleEvaluated, $formule);

            break;
        }
        return $res;
    }
    private function loaderFunction(){

    }

  private function evalArithmetiquefunction($formuleEvaluated,RecordFormule $formule){
      $use = "use evalLib\\MethodEval;";
      $res=null;
      eval("$use;\$res=$formuleEvaluated;");
      return $res;
  }
  private function evalLogiqueFunction($formuleEvaluated,RecordFormule $formule){
      $res=null;


      eval("\$res=$formuleEvaluated;");

      if($res){
          $resultat = $formule->getScore();
          if(is_array($resultat)){
            $res=$resultat['true'];
          }else{
              $res=$resultat;
          }
      }else{
          $resultat = $formule->getScore();
          if(is_array($resultat)){
              $res=$resultat['false'];
          }else{
              $res=$resultat['default'];
          }
      }

      return $res;
  }
  private function evalMixFunction($formuleEvaluated,RecordFormule $formule){
      $use = "use evalLib\\MethodEval;";
      $res=null;
      eval("$use;\$res=$formuleEvaluated;");
      if($res){
          $resultat = $formule->getScore();
          if(is_array($resultat)){
              $res=$resultat['true'];
          }else{
              $res=$resultat;
          }
      }else{
          $resultat = $formule->getScore();
          if(is_array($resultat)){
              $res=$resultat['false'];
          }else{
              $res=$resultat['default'];
          }
      }
      return $res;
  }


}