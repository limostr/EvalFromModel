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
    public $_RecordEval ;
    public $_RecordForm;
    public $_RecordDataBase;
    public $_SubComp=array();
    public $_Formule;
    public $_Template;
    public $_form;
    public $_Parent=Null;
    public $_AutreInformations;
    public $_Model ;


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

    public function ToNode(){
        
        $tree["key"]= $this->_RecordEval->getName();
        $tree["title"]= $this->_RecordEval->getLabel();
        $tree["tooltip"]= $this->_RecordEval->getLabel();
        $tree["folder"]= "false";
        $tree["iconclass"]="fa fa-file";

        if(is_array($this->_Formule)){
            foreach ($this->_Formule  as $key => $f){
                $Node["key"]= "_Formule_";
                $Node["title"]= "Formule";
                $Node["tooltip"]= "Formule";
                $Node["folder"]= "true";
                $Node["iconclass"]="fa fa-file";

                $Node['children'][]=$f->ToNode();
                $tree['children'][]=$Node;
                $tree["folder"]="true";
            }
        }

        if(is_array($this->_Model)){
            foreach ($this->_Model  as $key => $f){
                $Node["key"]= "_Model_";
                $Node["title"]= "Model";
                $Node["tooltip"]= "Model";
                $Node["folder"]= "true";
                $Node["iconclass"]="fa fa-file";

                $Node['children'][]=$f->ToNode();
                $tree['children'][]=$Node;
                $tree["folder"]="true";
            }
        }

        if(is_array($this->_form)){
            foreach ($this->_form  as $key => $f){
                $Node["key"]= "_Form_";
                $Node["title"]= "Formulaire";
                $Node["tooltip"]= "Formulaire";
                $Node["folder"]= "true";
                $Node["iconclass"]="fa fa-file";

                $Node['children'][]=$f->ToNode();
                $tree['children'][]=$Node;
                $tree["folder"]="true";
            }
        }

        foreach ($this->_SubComp as $key => $node){
            $tree['children'][]=$node->ToNode();
            $tree["folder"]="true";
        }
        return $tree;


    }
    public function Tree(){

        $tree[]=$this->toNode();
        return $tree;
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
        $this->_RecordEval->setParameters(isset($JsonDecode['parameters']) ? $JsonDecode['parameters'] : "");



        if(isset($JsonDecode['Formule']) && !empty($JsonDecode['Formule'])){
            foreach ($JsonDecode['Formule'] as $keyFormule => $Formule){
                $RecordForm=new RecordFormule();
                $RecordForm->setName($keyFormule);
                $RecordForm->setNature($Formule['nature']);
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

        if(isset($JsonDecode['database'])){
            $this->_RecordDataBase=new \evalLib\MetaRecords\RecordDataBase();
            $this->_RecordDataBase->Init($JsonDecode['database']);
        }

        if(isset($JsonDecode['template'])){
            $this->_Template=new \evalLib\MetaRecords\RecordTemplate();
            $this->_Template->init($JsonDecode['template']);
        }

        $this->_AutreInformations= isset($JsonDecode['AutreInformations']) ? (object) $JsonDecode['AutreInformations'] : Null;

    }




    public function setIn($varname,$value){
        $UID=str_ireplace(array("}","{"),"",$varname);
        $var = explode(":",$UID);

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
            case "prepareInit":

                if($var[$i+1][0]=="#"){
                    $key=str_replace("#","",$var[$i+1]);

                    $ChaineAcces.="->AddPrepareInit('$key',$valeur)";

                    eval("\$this$ChaineAcces;");
                }
                $i+=1;
                break;
            case "AutreInformations":
                $key=str_replace("@","",$var[$i+1]);
                $ChaineAcces.="->_AutreInformations->{$key}";
               /// echo "\$this$ChaineAcces='$valeur'=;";
                eval("\$this$ChaineAcces='$valeur';");
                $i+=1;
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
            case "database":
                $ChaineAcces.="->_RecordDataBase";
                break;
            case "sql":
                $next_request=$var[$i+1];
                $ChaineAcces.="->_Requests";
                if($next_request[0]=="#"){
                    $key=str_replace("#","",$next_request);
                    $ChaineAcces.="['$key']";

                }else{
                    $obj=null;

                    eval("\$obj=\$this$ChaineAcces;");
                    if(is_array($obj)){
                        foreach ($obj as $key => $Pval){
                            $tmpaccesschane=$ChaineAcces."['$key']";
                            $this->setInSpecificObject($var,($i+1),$tmpaccesschane,$valeur);
                        }
                    }
                }
                $i+=1;
                break;
            case "prepare":
                $next_request=$var[$i+1];

                if($next_request[0]=="#"){
                    $key=str_replace("#","",$next_request);
                     eval("\$this$ChaineAcces->{'setInPrepare'}('$key' ,$valeur);");

                }

                $i+=1;
                break;
            case "loader":

                $ChaineAcces.="->_Record_Load";

                break;
            case "init":
                $ChaineAcces.="->_Init";
                break;
            case "form":
                $ChaineAcces.="->_form";

                $next_request=$var[$i+1];

                if($next_request[0]=="#"){
                    $key=str_replace("#","",$next_request);
                    $ChaineAcces.="['$key']";

                }

                $i+=1;
                break;
            break;
            case "options":


            break;
            case "other":

                $key=str_replace("#","",$var[$i+1]);
                $ChaineAcces.="->setInOther('$key','$valeur')";
                //echo "\$this$ChaineAcces;";
                eval("\$this$ChaineAcces;");
                $i+=1;
                break;
            default :
               // echo  $ChaineAcces."<br>" ;
              //  echo $var[$i]."<br>";
                if($var[$i][0]=="@"){
                    $key=str_replace("@","",$var[$i]);
                    $obj=null;

                    //echo("\$obj=\$this$ChaineAcces;<br>");

                     eval("\$obj=\$this$ChaineAcces;");
                    if(!empty($ChaineAcces)  && is_array($obj)){
                        foreach ($obj as $keyp => $Pval){
                            $ChaineAcces2=$ChaineAcces;
                             $this->setInSpecificObject($var,$i+1,$ChaineAcces2,$valeur);
                        }
                    }elseif(isset($obj)  && $obj instanceof CompEvaluation){

                            $ChaineAcces.="->_RecordEval";

                        eval("\$obj=\$this$ChaineAcces;");
                           // print_r(get_class_methods($obj));
                             if( method_exists($obj ,"set$key")){
                               // echo get_class($obj)."set$key"."<br>";
                              //  echo "\$this$ChaineAcces->{'set$key'}($valeur);<br>";
                                eval("\$this$ChaineAcces->{'set$key'}($valeur);");
                              //  eval("echo \$this$ChaineAcces->{'get$key'}().'eeeeee';");
                            }
                    }else{

                       // echo "\$this$ChaineAcces->{'set$key'}($valeur);";
                        if($obj && method_exists($obj ,"set$key")){
                            eval("\$this$ChaineAcces->{'set$key'}('$valeur');");
                        }else{
                            eval("\$this$ChaineAcces->{'$key'}('$valeur');");
                        }

                    }
                }elseif($var[$i][0]=="#"){
                    $key=str_replace("#","",$var[$i]);
                  //  echo "\$this$ChaineAcces[$key]=$valeur;<br>";
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

        $varname=str_ireplace(array("}","{"),"",$varname);
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
                      //  echo "<b style='color:darkred'>$key</b>";
                        if(isset($Pointeur->_AutreInformations->{"$key"})){
                            $valeurFinal=$Pointeur=$Pointeur->_AutreInformations->{"$key"};
                        }

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
                    case "database":
                        $Pointeur=$Pointeur->_RecordDataBase;
                        break;
                    case "prepare":
                        $Pointeur=$Pointeur->getPrepare();
                        break;
                    case "loader":
                        $next_request=$var[$i+1];
                        $Pointeur=$Pointeur->getRecordLoad();
                        if($next_request[0]=="#"){
                            $next_request=str_replace("#","",$next_request);
                            $NPointeur=array();
                            if(is_array($Pointeur)){
                                foreach ($Pointeur as $key => $Pval){
                                    $NPointeur[]=$Pointeur[$key];
                                }
                            }else{
                                $NPointeur=$Pointeur[$next_request];
                             }

                            $Pointeur=$NPointeur;
                            $i++;
                        }
                        break;
                    case "init":
                        $Pointeur=$Pointeur->getInit();
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
                           // print_r($Pointeur);echo $var[$i];echo " $key<br>";
                            $valeurFinal=$Pointeur["$key"];
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

    public function initValuesFromDB($values){

    }
    public function InitValues($values){
        if(is_array($values)){
            foreach ($values as $key => $value){
               // echo "$key => $value <br>";
                $this->setIn($key,$value);
            }
        }else{

        }
    }

    /**
     * @return mixed
     */
    public function getRecordEval()
    {
        return $this->_RecordEval;
    }

    /**
     * @param mixed $RecordEval
     */
    public function setRecordEval($RecordEval)
    {
        $this->_RecordEval = $RecordEval;
    }

    /**
     * @return mixed
     */
    public function getRecordForm()
    {
        return $this->_RecordForm;
    }

    /**
     * @param mixed $RecordForm
     */
    public function setRecordForm($RecordForm)
    {
        $this->_RecordForm = $RecordForm;
    }

    /**
     * @return mixed
     */
    public function getRecordDataBase() : \evalLib\MetaRecords\RecordDataBase
    {
        return  $this->_RecordDataBase;
    }

    /**
     * @param mixed $RecordDataBase
     */
    public function setRecordDataBase($RecordDataBase)
    {
        $this->_RecordDataBase = $RecordDataBase;
    }

    /**
     * @return mixed
     */
    public function getFormule()
    {
        return $this->_Formule;
    }

    /**
     * @param mixed $Formule
     */
    public function setFormule($Formule)
    {
        $this->_Formule = $Formule;
    }

    /**
     * @return mixed
     */
    public function getForm()
    {
        return $this->_form;
    }

    /**
     * @param mixed $form
     */
    public function setForm($form)
    {
        $this->_form = $form;
    }

    /**
     * @return CompEvaluation|null
     */
    public function getParent()
    {
        return $this->_Parent;
    }

    /**
     * @param CompEvaluation|null $Parent
     */
    public function setParent($Parent)
    {
        $this->_Parent = $Parent;
    }

    /**
     * @return mixed
     */
    public function getAutreInformations()
    {
        return $this->_AutreInformations;
    }

    /**
     * @param mixed $AutreInformations
     */
    public function setAutreInformations($AutreInformations)
    {
        $this->_AutreInformations = $AutreInformations;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->_Model;
    }

    /**
     * @param mixed $Model
     */
    public function setModel($Model)
    {
        $this->_Model = $Model;
    }


}