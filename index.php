
<?php
defined('BASE_PATH')  || define('BASE_PATH', realpath(dirname(__FILE__)));

include "Autoloader.php";
Autoloader::register();

include "models/dataval.php";
include "models/UEtoEval.php";
include "evalmodel/mpwin/commission/eval.php";
include "evalmodel/calculemoy/eval.php";



 library\Readers\Configuration::config();
 library\database\dbadapter::connect();

$Comp=new \evalLib\CompEvaluation($_Model_Eval['ReleverS1']);

//$DataBaseInit=new \evalLib\DBInitCompLoader($Comp);

 //$DataBaseInit->initPrepare($_GET);
 //$DataBaseInit->LoadData($Comp);
 
 
//print_r($Comp);
 //$formstructur=new \evalLib\MetaRecords\FormStructer("aa","bb");

?>

<?php

if(count($_POST)<=0){
    $form = new \evalLib\FormEvaluation($Comp);
    $form->setFormAttrib(new \evalLib\MetaRecords\FormStructer("","Post","Idform","NameForm","form",array("role"=>"form")));
    echo $form;
}else{
   // print_r($_POST);
    $Comp->InitValues($_POST);
    echo "<pre>";  print_r($Comp);echo "</pre>";
    ///
    ///


    $Evaluateur=new \evalLib\Evaluateur($Comp);
    $Evaluateur->Evaluation();

   // $DataBaseInit=new \evalLib\DBInitCompLoader($Comp);

   // $DataBaseInit->InsertInDB($Comp);

    $Vue=new \evalLib\ViewGen($Comp);
    $Vue->_InitValue();
  
   $EvalDataLigne = $Vue->genLigneArray();
    echo "<pre>";  print_r($EvalDataLigne);echo "</pre>";
	
	 echo $Vue->genVue(file_get_contents(dirname(__FILE__)."/view/relever1.phtml"));
	 

}
/*$Comp=new \evalLib\CompEvaluation($ue);

$Evaluateur=new \evalLib\Evaluateur($Comp);
$form = new \evalLib\FormEvaluation($Comp);
echo $form;*/
?>