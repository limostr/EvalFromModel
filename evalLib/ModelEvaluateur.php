<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 27/05/2018
 * Time: 23:42
 */

namespace evalLib;


class ModelEvaluateur
{
    public function getModel($ModelName){

    }

    public function modelSelector($ModelName){
        $Model=$this->getModel($ModelName);
        $Comp=new \evalLib\CompEvaluation($Model);
        $DataBaseInit=new \evalLib\DBInitCompLoader($Comp);
        $DataBaseInit->initPrepare($_GET);
        $DataBaseInit->LoadData($Comp);
    }

    public function ModelGenerateFormEdition($action="",$Method="Post"){
        $Model=$this->getModel();
        $Comp=new \evalLib\CompEvaluation($Model);
        $form = new \evalLib\FormEvaluation($Comp);
        $form->setFormAttrib(new \evalLib\MetaRecords\FormStructer($action,$Method,"Idform","NameForm","form",array("role"=>"form")));
        return $form;
    }

    public function ModelGetSubmit(){

    }

    public function ModelDataBaseBindIn(){

    }

    public function ModelDataBaseBindOut(){

    }
}