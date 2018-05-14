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
               print_r($Array);
               $record=\evalLib\database\dbadapter::SelectWithPrepare($sqlString,$Array);
               print_r($record);
            }


            foreach ($CompEval as $key => $CompToEval){

                if(is_array($CompToEval->_SubComp) && count($CompToEval->_SubComp)) {
                    $this->LoadData($CompToEval->_SubComp);
                }


            }
        }
    }

    public function RedirectForChose(){

    }


}