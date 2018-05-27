
<?php

include "Autoloader.php";
Autoloader::register();

include "models/dataval.php";
include "models/UEtoEval.php";

library\Readers\Configuration::config();
library\database\dbadapter::connect();

$Comp=new \evalLib\CompEvaluation($LAModel);

 $DataBaseInit=new \evalLib\DBInitCompLoader($Comp);

 $DataBaseInit->initPrepare($_GET);
 $DataBaseInit->LoadData($Comp);
//print_r($Comp);
$formstructur=new \evalLib\MetaRecords\FormStructer("aa","bb");

?>

<?php

if(count($_POST)<=0){
    $form = new \evalLib\FormEvaluation($Comp);
    $form->setFormAttrib(new \evalLib\MetaRecords\FormStructer("","Post","Idform","NameForm","form",array("role"=>"form")));
    echo $form;
}else{
   // print_r($_POST);
    $Comp->InitValues($_POST);
  ///  print_r($Comp);
    ///
    ///


    $Evaluateur=new \evalLib\Evaluateur($Comp);
    $Evaluateur->Evaluation();

    $DataBaseInit=new \evalLib\DBInitCompLoader($Comp);

    $DataBaseInit->InsertInDB($Comp);

    $Vue=new \evalLib\ViewGen($Comp);
    $Vue->_InitValue();
   echo $Vue->genVue(file_get_contents(dirname(__FILE__)."/view/relever.phtml"));

}
/*$Comp=new \evalLib\CompEvaluation($ue);

$Evaluateur=new \evalLib\Evaluateur($Comp);
$form = new \evalLib\FormEvaluation($Comp);
echo $form;*/
?>