<pre>
<?php

include "Autoloader.php";
Autoloader::register();

include "models/dataval.php";
include "models/UEtoEval.php";

$Comp=new \evalLib\CompEvaluation($LAModel);

$Evaluateur=new \evalLib\Evaluateur($Comp);
//print_r($Comp);
$Evaluateur->Evaluation();

$formstructur=new \evalLib\MetaRecords\FormStructer("aa","bb");

?>
</pre>
<?php

if(count($_POST)<=0){
    $form = new \evalLib\FormEvaluation($Comp);
    $form->setFormAttrib(new \evalLib\MetaRecords\FormStructer("","Post","Idform","NameForm","form",array("role"=>"form")));
    echo $form;
}else{
    print_r($_POST);
}

$Comp=new \evalLib\CompEvaluation($ue);

$Evaluateur=new \evalLib\Evaluateur($Comp);
$form = new \evalLib\FormEvaluation($Comp);
echo $form;
?>


