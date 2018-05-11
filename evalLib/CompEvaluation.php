<?php

namespace evalLib;
use evalLib\MetaRecords\RecordForm;
use evalLib\MetaRecords\RecordFormule;
use evalLib\MetaRecords\RecordModelEval;
use evalLib\MetaRecords\RecordEval;

/**
 * Class CompEvaluation
 * Composante d'èvaluation
 */

class CompEvaluation
{
    public $_RecordEval;
    public $_RecordForm;
    public $_RecordLoader;
    public $_Formule;
    public $_form;
    public $_Parent=Null;
    public $_AutreInformations;
    public $_Model ;

    public $_SubComp=array();

    private  $_Original;
    public function __construct($structur,CompEvaluation $Parent=Null)
    {
        $this->_Parent=$Parent;

        if(!empty($structur) ){
           // $this->_Original=$structur;
             $this->DecodeAndInstance($structur);
        }else{
             throw  new \Exception("Erreur de construction d'objet à partir de ");
        }

    }

    public function getSubComp(string $varname) :CompEvaluation
    {
        return $this->_SubComp[$varname];
    }

    /**
     * @param array $SubComp
     */
    public function setSubComp(CompEvaluation $SubComp)
    {
        $this->_SubComp[$SubComp->_RecordEval->getName()] = $SubComp;
    }

    public function toJson() {

    }

    private function DecodeAndInstance($StrComp){

        if($StrComp instanceof string){
            $JsonDecode = json_decode($StrComp);
        }else{
            $JsonDecode=$StrComp;
        }

        $this->InitComp($JsonDecode);
         if(isset($JsonDecode['SubComp'])){
            foreach ($JsonDecode['SubComp'] as $JDecoded){
                $this->setSubComp(new CompEvaluation($JDecoded,$this));
            }
        }
    }

    private function InitComp($JsonDecode = array()){

        $this->_RecordEval=new RecordEval();
        $this->_RecordEval->setAffiche(isset($JsonDecode['Affiche']) ? $JsonDecode['Affiche'] : "") ;
        $this->_RecordEval->setDecission(isset($JsonDecode['decission']) ? $JsonDecode['decission'] : "");
        $this->_RecordEval->setDescription(isset($JsonDecode['description']) ? $JsonDecode['description'] : "");
        $this->_RecordEval->setLabel(isset($JsonDecode['Label']) ? $JsonDecode['Label'] : "");
        $this->_RecordEval->setName(isset($JsonDecode['Name']) ? $JsonDecode['Name'] : "");
        $this->_RecordEval->setScore(isset($JsonDecode['Score']) ? $JsonDecode['Score'] : "");
        $this->_RecordEval->setPoid(isset($JsonDecode['Poid']) ? $JsonDecode['Poid'] : "");

        if(isset($JsonDecode['Formule']) && !empty($JsonDecode['Formule'])){
            foreach ($JsonDecode['Formule'] as $keyFormule => $Formule){
                $RecordForm=new RecordFormule();
                $RecordForm->setName($keyFormule);
                $RecordForm->setScore($Formule['score']);
                $RecordForm->setDescription($Formule['description']);
                $RecordForm->setToEval($Formule['toEval']);
                $RecordForm->setType($Formule['type']);
                $RecordForm->setDefault($Formule['default']);
                $RecordForm->setBind($Formule['bind']);
                $this->_Formule[$keyFormule]=$RecordForm;
            }
        }

        if(isset($JsonDecode['form']) && !empty($JsonDecode['form'])){
            foreach ($JsonDecode['form'] as $keyForm => $Form){
                $RecordForm=new RecordForm();
                $RecordForm->setName($keyForm);
                $RecordForm->setLabel(isset($Form['label']) ?$Form['label'] : "");
                $RecordForm->setClass(isset($Form['options']['class']) ? $Form['options']['class'] : "");
                $RecordForm->setId(isset($Form['id']) ? $Form['id'] : "");
                $RecordForm->setOther(isset($Form['options']['other']) ? $Form['options']['other'] : "");
                $RecordForm->setType(isset($Form['type']) ? $Form['type'] : "");
                $RecordForm->setList(isset($Form['list']) ? $Form['list'] : "");

                $this->_form[$keyForm]=$RecordForm;
            }
        }

        if(isset($JsonDecode['Model'])){
            foreach ($JsonDecode['Model'] as $keyForm => $Form){
                $RecordModelEval=new RecordModelEval();
                $RecordModelEval->setName($keyForm);
                $RecordModelEval->setLabel(isset($Form['Label']) ?$Form['Label'] : "");
                $RecordModelEval->setDescription(isset($Form['description']) ?$Form['description'] : "");
                $RecordModelEval->setScore(isset($Form['Score']) ?$Form['Score'] : "");
                $RecordModelEval->setPoid(isset($Form['Poid']) ?$Form['Poid'] : "");
                $RecordModelEval->setDecission(isset($Form['decission']) ?$Form['decission'] : "");
                $RecordModelEval->setAffiche(isset($Form['Affiche']) ?$Form['list'] : "");
                $RecordModelEval->constructFormule($Form['Formule']);
                $this->_Model[$keyForm]=$RecordModelEval;
            }
        }
        $this->_AutreInformations= isset($JsonDecode['AutreInformations']) ? (object) $JsonDecode['AutreInformations'] : Null;

    }


    public function setIn($varname,$value){
        $var = explode(":",$varname);

        if(count($var)==2) {
            if($var[1][0]=="@"){
                $key=str_replace("@","",$var[1]);
                $this->_RecordEval->{"set$key"}($value);
            }
        }else{
            $ChaineAccess="";
          //  print_r($var);
            $this->setInSpecificObject($var,0,$ChaineAccess,$value);
        }
    }

    public function setInSpecificObject($var,$i=1,&$ChaineAcces="\$this",$valeur){
       // echo $i."=>".$var[$i]."<br>";
        if($i==count($var)){
            return;
        }

       // echo $ChaineAcces."<br>";
        switch ($var[$i]){
            case "SubComp":
                $next_request=$var[$i+1];
                if($next_request[0]=="#"){
                    $next_request=str_replace("#","",$next_request);
                    $ChaineAcces.="->_SubComp['$next_request']";

                }else{
                    $ChaineAcces2=$ChaineAcces."->_SubComp['$next_request']";
                    $obj=null;
                    eval("$obj=$ChaineAcces2;");

                    if(is_array($obj)){
                        foreach ($obj->{"_SubComp"} as $key => $Pval){
                            $tmpaccesschane=$ChaineAcces."[$key]->_SubComp['$next_request']";

                            $this->setInSpecificObject($var,($i+1),$tmpaccesschane,$valeur);
                        }
                    }
                }
                $i+=1;
                break;
            case "AutreInformations":
                $key=str_replace("@","",$var[$i+1]);
                $ChaineAcces.="->_AutreInformations->{$key}";

                break;
            case "Model":
                $next_request=$var[$i+1];
                if($next_request[0]=="#"){
                    $next_request=str_replace("#","",$next_request);
                    $tmpchaine=$ChaineAcces."->_Model['$next_request']";
                    $obj=null;
                    eval("\$obj=\$this$tmpchaine;");

                    if(isset($obj) && is_array($obj)){
                        $ChaineAcces.=!empty($ChaineAcces) ? "->_Model['$next_request']": "_Model['$next_request']";
                        foreach ($obj as $key => $Pval){
                            $tmpaccesschane=$ChaineAcces."[$key]->_Model['$next_request']";

                            $this->setInSpecificObject($var,($i+1),$tmpaccesschane,$valeur);
                        }

                    }else{
                        $ChaineAcces.="->_Model['$next_request']";
                        $i=$i+1;
                    }
                }else{

                   $obj=null;
                   eval("\$obj=\$this$ChaineAcces;");
                    if(isset($obj) && is_array($obj)){
                        foreach ($obj as $key => $Pval){
                            if(is_object($obj[$key])){
                                $tmpaccesschane=$ChaineAcces."[$key]->_Model['$next_request']";
                                $this->setInSpecificObject($var,($i+1),$tmpaccesschane,$valeur);
                            }
                        }
                    }else{
                        $ChaineAcces.="->_Model[$next_request]";
                    }

                }

                break;
            default :
               // echo  $ChaineAcces."<br>" ;
              //  echo $var[$i]."<br>";
                if($var[$i][0]=="@"){
                    $key=str_replace("@","",$var[$i]);
                    $obj=null;
                    eval("\$obj=\$this$ChaineAcces;");
                    if(!empty($ChaineAcces)  && is_array($obj)){
                        foreach ($obj as $keyp => $Pval){
                            $ChaineAcces2=$ChaineAcces;
                            //$this->setInSpecificObject($var,$i+1,$ChaineAcces2,$valeur);
                        }
                    }elseif(isset($obj)  && $obj instanceof CompEvaluation){
                            $ChaineAcces.="->_RecordEval";
                            if($obj && method_exists($obj ,"set$key")){
                                eval("\$this$ChaineAcces->{'set$key'}($valeur);");

                            }
                    }else{
                        if($obj && method_exists($obj ,"set$key")){
                            eval("\$this$ChaineAcces->{'set$key'}($valeur);");
                            echo "\$this$ChaineAcces->{'set$key'}($valeur);";
                        }
                    }
                }elseif($var[$i][0]=="#"){
                    $key=str_replace("#","",$var[$i]);
                    echo "\$this$ChaineAcces->{'set$key'}($valeur);<br>";
                    eval("\$this$ChaineAcces[$key]=$valeur;");
                }

                break;

        }
        //echo "<b style='color: deeppink;'>$ChaineAcces</b><br>";

        $i+=1;
        if($i< count($var)){
            $this->setInSpecificObject($var,$i,$ChaineAcces,$valeur);
        }

    }

     public function lookForVariable($varname){
        

        $var = explode(":",$varname);
        $valeurFinal=null;
        if(count($var)>0){
            $Pointeur=$this;
            for ($i=0;$i<count($var);$i++){

                switch ($var[$i]){
                    case "SubComp":
                        $next_request=$var[$i+1];
                        if($next_request[0]=="#"){
                            $next_request=str_replace("#","",$next_request);
                            $Pointeur=$Pointeur->_SubComp[$next_request];

                            $i++;
                        }elseif($next_request[0]=="@"){

                        }else{
                            $Pointeur=$Pointeur->_SubComp;
                        }
                    break;
                    case "AutreInformations":
                        $key=str_replace("@","",$var[$i+1]);
                        $valeurFinal=$Pointeur=$Pointeur->_AutreInformations->{"$key"};
                        $i++;

                    break;
                    case "Model":

                        $next_request=$var[$i+1];

                        if($next_request[0]=="#"){
                            $next_request=str_replace("#","",$next_request);
                            $NPointeur=array();
                            if(is_array($Pointeur)){
                                foreach ($Pointeur as $key => $Pval){
                                    $NPointeur[]=$Pointeur[$key]->_Model['$next_request'];
                                }
                            }else{

                                $NPointeur=$Pointeur->_Model[$next_request];
                                //echo "<pre style='color:blue;'>";print_r($NPointeur);echo"</pre>";
                            }

                            $Pointeur=$NPointeur;
                            $i++;
                        }else{

                            $NPointeur=array();
                            if(is_array($Pointeur)){
                                foreach ($Pointeur as $key => $Pval){
                                    if(is_object($Pointeur[$key]  )){
                                        $NPointeur[]=$Pointeur[$key]->_Model[$next_request];
                                    }
                                }
                            }else{
                                $NPointeur=$Pointeur->_Model[$next_request];
                            }

                            $Pointeur=$NPointeur;
                            $i++;
                        }

                        break;
                    default :
                        if($var[$i][0]=="@"){
                            $key=str_replace("@","",$var[$i]);

                            if(is_array($Pointeur)){
                                $NPointeur=array();
                                foreach ($Pointeur as $keyp => $Pval){
                                    if($Pointeur[$keyp] && method_exists($Pointeur[$keyp],"get$key")){
                                        $valeurFinal[]=$Pointeur[$keyp]->{"get".$key}();
                                    }
                                }

                            }else{

                                if($Pointeur instanceof CompEvaluation){
                                    if($Pointeur->_RecordEval && method_exists($Pointeur->_RecordEval ,"get$key")){
                                        $valeurFinal=$Pointeur->_RecordEval->{"get$key"}();
                                    }
                                }

                            }

                        }elseif($var[$i][0]=="#"){
                            $key=str_replace("#","",$var[$i]);
                            $valeurFinal=$Pointeur[$key];
                        }

                    break;

                }
            }

            return $valeurFinal;
        }
        return Null;
     }
    private function is_Key_Or_Name($node,$lokingfor){
        if(is_object($node)){
            if(isset($node->{$lokingfor})){
                return "Attrib";
            }
        }elseif(is_array($node)){
            if(isset($node[$lokingfor])){
                return "Key";
            }
        }
        return false;
    }



}