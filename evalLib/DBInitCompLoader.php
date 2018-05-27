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
    public function constructDataInSub($Comp,$Data){

    }

    public function InsertInDB($CompEval){
        $this->insertData($CompEval);
        foreach ($CompEval->_SubComp as $sub => $comp){
            $this->InsertInDB($comp);
        }
    }

    public function insertData($CompEval){
        $Inserts=$CompEval->_RecordDataBase->_Record_Insert;
        foreach ($Inserts as $key =>$InsertObj){

            $Insert=$InsertObj->getBind();

            if(isset($Insert['DATA'])){

                $dataToInsert=[];
                foreach ($Insert['DATA'] as $typekey => $binddata){
                    if($typekey=="records"){
                        echo "<pre style='color:red'>";print_r($binddata);echo "</pre>";
                        $dataTemp=[];

                        foreach ($binddata as $RecName => $AttribLooK){
                            $value=$this->CompEval->lookForVariable($AttribLooK);
                            $dataTemp[$RecName]=$value;
                        }
                        $dataToInsert=$dataTemp;
                    }else{
                        $value=$this->CompEval->lookForVariable($binddata);
                        $dataToInsert[$typekey]=$value;
                    }

                }

                //update ids
                $ArrayUpdateData=[];
                $UpdateData=$InsertObj->getUpdateCondition();
                foreach ($UpdateData as $attribUpdate => $updateVar){
                    $updateValure=$this->CompEval->lookForVariable($updateVar);
                    if(!empty($updateValure)){
                        $ArrayUpdateData[$attribUpdate]=$updateValure;
                    }

                }
                echo "<pre style='color:#1c7430'>";print_r($dataToInsert);echo "</pre>";
                echo "<pre style='color:#0b2e13;'>";print_r($ArrayUpdateData);echo "</pre>";
                if(count($dataToInsert)>0){
                    if(count($ArrayUpdateData)>=1){
                        \library\database\dbadapter::Update($InsertObj->getTable(),$dataToInsert,$ArrayUpdateData);
                    }else{
                        \library\database\dbadapter::Insert($InsertObj->getTable(),$dataToInsert);
                    }
                }



            }

        }
    }





    public function LoadData(CompEvaluation $CompEval){

        if($CompEval->_RecordDataBase){

            $SqlToLoad= $CompEval->_RecordDataBase->getRecordLoad()->getRequests();
           // print_r($SqlToLoad);
            $listSelect="";
            foreach ($SqlToLoad as $key => $Sql){

                if($Sql->_SelectorType){
                    $MultipleSelect=$Sql->_SelectorType->getMultiple();
                    if($MultipleSelect==1){
                        $has=$this->RedirectForChose($Sql,$html);
                        if($has){
                            echo $html;
                            return;
                        }
                    }elseif($MultipleSelect==0){
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

                }

               $sqlString=$Sql->getSql();

               $ArrayPrepare= $Sql->getPrepare();
               $Array=[];
               foreach ($ArrayPrepare as $Attrib => $NameInLoad){

                   if(isset($NameInLoad[0]) && $NameInLoad[0]=="{"){
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
                                        //echo $keyt."<br>";
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
                /* echo "<pre style='color:red'>";
                echo $sqlString."<br>";
                print_r($listSelect);
                print_r($PreapareInit);*/


                $record=\library\database\dbadapter::SelectWithPrepare($sqlString,$Array,$listSelect);

               // print_r($record);
               // echo "</pre>";


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