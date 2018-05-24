<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 12:40
 */

namespace evalLib;


use evalLib\MetaRecords\RecordDB\RecordLoader;
use evalLib\MetaRecords\RecordDB\RecordSql;

class DBInitCompLoader
{
    private $CompEval;


    public  function __construct(CompEvaluation  &$CompEval)
    {
        $this->CompEval=$CompEval;
    }

    public function initPrepare($data=array()){

        $params=count($data)>0 ? $this->CompEval->_RecordEval->getParameters() : array();

        foreach ($data as $param => $value){

            $this->CompEval->setIn($params[$param],$value);
        }
    }

    public function LoadData(CompEvaluation $CompEval){

        if($CompEval->_RecordDataBase){

            $SqlToLoad= $CompEval->_RecordDataBase->getRecordLoad()->getRequests();
           // print_r($SqlToLoad);
            $listSelect="";
            foreach ($SqlToLoad as $key => $Sql){

                if($Sql->_SelectorType){
                    $has=$this->RedirectForChose($Sql,$html);
                    if($has){
                        echo $html;
                        return;
                    }
                }elseif($Sql->_SelectorType==0){
                    $Chose= $Sql->_SelectorType->getChose();

                    foreach ($Chose as $attrib => $liste){
                        foreach ($liste as $typeSelect => $AttribElt){
                            switch ($typeSelect){
                                case "IN":
                                    $listSelect.= !empty($listSelect) ? " AND $attrib IN ('".implode("','",$AttribElt)."')" : " $attrib IN ('".implode("','",$AttribElt)."')";
                                    break;
                                case "NOTIN":
                                    $listSelect.= !empty($listSelect) ? " AND $attrib NOT IN ('".implode("','",$AttribElt)."')" : " $attrib NOT IN ('".implode("','",$AttribElt)."')";
                                    break;
                                case "SIMPLE":
                                    $listSelect.=!empty($listSelect) ? "   AND $attrib='$AttribElt' " : " $attrib='$AttribElt' ";
                                    break;
                            }
                        }
                    }
                }

               $sqlString=$Sql->getSql();

               $ArrayPrepare= $Sql->getPrepare();
               $Array=[];
               foreach ($ArrayPrepare as $Attrib => $NameInLoad){
                   if($NameInLoad[0]=="{"){
                       $Array[$Attrib]=$this->CompEval->lookForVariable($NameInLoad);
                   }else{
                       $Array[$Attrib]=$NameInLoad;
                   }

               }

                $PreapareInit=$Sql->getPrepareInit();


                if(count($PreapareInit)>0){

                    foreach ($PreapareInit as $Attrib => $NameInLoad){
                        if($NameInLoad[0]=="{"){
                            $Array[$Attrib]=$this->CompEval->lookForVariable($NameInLoad);
                            $listSelect.=!empty($listSelect) ? " AND $Attrib=:$Attrib " : "$Attrib=:$Attrib";
                        }else{
                            $listSelect.=!empty($listSelect) ? " AND $Attrib=:$Attrib " : "$Attrib=:$Attrib";
                            $Array[$Attrib]=$NameInLoad;
                        }
                    }
                }
                 echo $listSelect."<br>";
                $record=\library\database\dbadapter::SelectWithPrepare($sqlString,$Array,$listSelect);



                $Binds= $Sql->getBind();
               // print_r($record);

                if(count($record)==1){
                    $record=$record[0];
                }

                foreach ($Binds as $keyType => $varArray){
                    if($keyType == "SET"){
                        foreach ($varArray as $keybind => $varname) {
                                if (isset($record[$keybind])) {
                                    //echo $varname . "=>$keybind:" . $record[$keybind]."<br>";
                                    $this->CompEval->setIn($varname, $record[$keybind]);
                                 }
                            }
                    }elseif($keyType == "GET"){

                        if(isset($varArray["records"])){
                            $i=1;
                            foreach ($record as $rec){
                                foreach ($varArray["records"] as $keybind => $varname) {
                                    $keytemplate=$keybind;
                                    if (isset($rec[$varname])) {
                                        $keyt=str_ireplace("?",$i,$keytemplate);
                                        $this->CompEval->setIn($keyt, $rec[$varname]);
                                    }
                                }
                                $i+=1;
                            }
                        }else{

                            foreach ($varArray as $keybind => $varname) {

                                if (isset($record[$varname])) {
                                     $this->CompEval->setIn($keybind, $record[$varname]);

                                }
                            }
                        }

                    }

                }
            }

            foreach ($CompEval as $key => $CompToEval){

                if(isset($CompToEval->_SubComp) && ($CompToEval->_SubComp) && count($CompToEval->_SubComp)) {
                    $this->LoadData($CompToEval->_SubComp);
                }


            }
        }
    }

    public function RedirectForChose(RecordSql $Sql,&$html=""){
        $has=false;
        if($Sql->_SelectorType){
            $Multiple=$Sql->_SelectorType->getMultiple();
            if($Multiple==1){

                $sqlString=$Sql->getSql();

                $ArrayPrepare= $Sql->getPrepare();
                $Array=[];
                foreach ($ArrayPrepare as $Attrib => $NameInLoad){
                    if($NameInLoad[0]=="{"){
                        $Array[$Attrib]=$this->CompEval->lookForVariable($NameInLoad);
                    }else{
                        $Array[$Attrib]=$NameInLoad;
                    }
                }

                $PreapareInit=$Sql->getPrepareInit();
                $listSelect="";
                if(count($PreapareInit)>0){

                    foreach ($PreapareInit as $Attrib => $NameInLoad){
                        if($NameInLoad[0]=="{"){
                            $Array[$Attrib]=$this->CompEval->lookForVariable($NameInLoad);
                            $listSelect.=!empty($listSelect) ? " AND $Attrib=:$Attrib " : "$Attrib=:$Attrib";
                        }else{
                            $listSelect.=!empty($listSelect) ? " AND $Attrib=:$Attrib " : "$Attrib=:$Attrib";
                            $Array[$Attrib]=$NameInLoad;
                        }
                    }
                }

                $Chose= $Sql->_SelectorType->getChose();


                foreach ($Chose as $attrib => $liste){
                    foreach ($liste as $typeSelect => $AttribElt){
                        switch ($typeSelect){
                            case "IN":
                                $listSelect.= !empty($listSelect) ? " AND $attrib IN ('".implode("','",$AttribElt)."')" : " $attrib IN ('".implode("','",$AttribElt)."')";
                            break;
                            case "NOTIN":
                                $listSelect.= !empty($listSelect) ? " AND $attrib NOT IN ('".implode("','",$AttribElt)."')" : " $attrib NOT IN ('".implode("','",$AttribElt)."')";
                            break;
                            case "SIMPLE":
                                $listSelect.=!empty($listSelect) ? "   AND $attrib='$AttribElt' " : " $attrib='$AttribElt' ";
                            break;
                        }
                    }
                }
                //print_r($sqlString);
             /*   echo "<pre style='color:red'>";
                echo $sqlString."<br>";
                print_r($listSelect);
                print_r($PreapareInit);
                echo "</pre>";*/

                $record=\library\database\dbadapter::SelectWithPrepare($sqlString,$Array,$listSelect);




                $has=count($record)>1 ? true : false;
                if($has){
                    $bind = $Sql->_SelectorType->getBind();
                    $template = $Sql->_SelectorType->getTemplate();
                    $html = $template['message'];
                    $templateHtml =$template['template'];
                    foreach ($record as $r){
                        $htmlTemp=$templateHtml;
                        $replace = false;
                        foreach ($bind as $keyattrib => $templatelabel){
                            if(isset($r[$keyattrib])){
                                $replace=true;
                                $htmlTemp=str_ireplace($templatelabel,$r[$keyattrib],$htmlTemp);
                            }
                        }

                        if($replace){
                            $html.=$htmlTemp;
                        }
                    }

                }


            }

        }
            return $has;
    }


}