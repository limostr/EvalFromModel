<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 28/08/2018
 * Time: 18:39
 */


include(dirname(__FILE__)."/metrise.php");
include(dirname(__FILE__)."/licence.php");
include(dirname(__FILE__)."/master.php");
include(dirname(__FILE__)."/ingenieur.php");



$_Model_Eval['Licence']=$Licence;
$_Model_Eval['Maitrise']=$Maitrise;
$_Model_Eval['Ingenieur']=$Ingenieur;
$_Model_Eval['Master']=$Master;

$MasterPriseLicence=true;

 $choixpoid =array(
             
             'Ingénieur' => 4
            , 'Master' => 2
            , 'Maîtrise' => 3
            , 'Appliqué' => 3
            , 'Fondamentale' => 3
            , 'DUT' => 3
        );
 
 
 
$_Model_Eval['Template']=array("Formation"    	=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
,"N1"       		=> array("ordre"=>5,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N1:@Score}","Value"=>"")
,"N2"       		=> array("ordre"=>6,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N2:@Score}","Value"=>"")
,"N3"       		=> array("ordre"=>7,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N3:@Score}","Value"=>"")
,"Redouble" 		=> array("ordre"=>8,"Label"=>"Nombre de redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@nbrredouble}","Value"=>"")
,"Malus"      		=> array("ordre"=>11,"Label"=>"Malus redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Malus}","Value"=>"")
,"BS"				=> array("ordre"=>9,"Label"=>"BS: Bonus Session","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BS}","Value"=>"")
,"Moy"      		=> array("ordre"=>10,"Label"=>"MG: Moyenne des années d’études après le BAC","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Ingenieur:SubComp:Model:Moy:@Score})","Value"=>"")
,"BM"      		    => array("ordre"=>10,"Label"=>"BM: Bonus mention","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BM}","Value"=>"")
,"BEP"  			=> array("ordre"=>2,"Label"=>"Bonus d’études pertinentes ","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BEP}","Value"=>"")
,"BADP"    			=> array("ordre"=>1,"Label"=>"Bonus d’autres diplômes pertinents","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BADP}","Value"=>"")
,"BEPFPP"    		=> array("ordre"=>1,"Label"=>"Bonus selon la ’professionnelle et/ou formation(s) professionnalisante(s)  ","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BEPFPP}","Value"=>"")
,"Final"    		=> array("ordre"=>14,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Ingenieur:@Score}","Value"=>"")

)
	;

