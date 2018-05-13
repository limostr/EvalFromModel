<pre>
<?php

include "Autoloader.php";
Autoloader::register();

include "models/dataval.php";
include "models/UEtoEval.php";

evalLib\Readers\Configuration::config();
evalLib\database\dbadapter::connect();

$Comp=new \evalLib\CompEvaluation($LAModel);



$formstructur=new \evalLib\MetaRecords\FormStructer("aa","bb");

?>

<?php

if(count($_POST)<=0){
    $form = new \evalLib\FormEvaluation($Comp);
    $form->setFormAttrib(new \evalLib\MetaRecords\FormStructer("","Post","Idform","NameForm","form",array("role"=>"form")));
    echo $form;
}else{
    print_r($_POST);
    $Comp->InitValues($_POST);
  ///  print_r($Comp);
    $Evaluateur=new \evalLib\Evaluateur($Comp);
    $Evaluateur->Evaluation();
}

/*$Comp=new \evalLib\CompEvaluation($ue);

$Evaluateur=new \evalLib\Evaluateur($Comp);
$form = new \evalLib\FormEvaluation($Comp);
echo $form;*/
?>

</pre>
