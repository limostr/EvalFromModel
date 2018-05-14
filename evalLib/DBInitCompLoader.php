<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 12:40
 */

namespace evalLib;


class DBInitCompLoader
{
    private $CompEval;


    public  function __construct(CompEvaluation  &$CompEval)
    {
        $this->CompEval=$CompEval;
    }


    public function LoadData(CompEvaluation $CompEval){

        if($CompEval->_RecordDataBase){

            $SqlToLoad= $CompEval->_RecordDataBase->getRecordLoad()->getRequests();


            foreach ($SqlToLoad as $key => $Sql){
               $sqlString=$Sql->getSql();
               $ArrayPrepare= $Sql->getPrepare();
               $Array=[];
               foreach ($ArrayPrepare as $Attrib => $NameInLoad){

                   $Array[$Attrib]=$this->CompEval->lookForVariable($NameInLoad);


               }
                $record=\evalLib\database\dbadapter::SelectWithPrepare($sqlString,$Array);
                if(count($record)==1){
                    $record=$record[0];
                }
                $Binds= $Sql->getBind();
                foreach ($Binds as $keybind => $varname){
                    if(isset($record[$keybind])){

                        $this->CompEval->setIn($varname,$record[$keybind]);
                    }

                }

               print_r($record);
            }


            foreach ($CompEval as $key => $CompToEval){

                if(isset($CompToEval->_SubComp) && ($CompToEval->_SubComp) && count($CompToEval->_SubComp)) {
                    $this->LoadData($CompToEval->_SubComp);
                }


            }
        }
    }

    public function RedirectForChose(){

    }


}