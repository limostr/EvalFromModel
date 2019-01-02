<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 28/08/2018
 * Time: 18:39
 */


include(dirname(__FILE__)."/metrise.php");
include(dirname(__FILE__)."/licence.php");
include(dirname(__FILE__)."/technicien.php");
include(dirname(__FILE__)."/ingenieur.php");
include(dirname(__FILE__)."/master.php");


$_Model_Eval['Licence']=$Licence;
$_Model_Eval['Maitrise']=$Maitrise;
$_Model_Eval['Ingenieur']=$Ingenieur;
$_Model_Eval['Technicien']=$Technicien;
$_Model_Eval['Master']=$Master;
 
$_Model_Eval['Template']=array(
		
				"Formation"    		=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
				,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
				,"Moybac"       	=> array("ordre"=>7,"Label"=>"Moyenne du bac","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@bacmoyenne}","Value"=>"")
				,"N1"       		=> array("ordre"=>7,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N1:@Score}","Value"=>"")
				,"N2"       		=> array("ordre"=>7,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N2:@Score}","Value"=>"")
				,"N3"       		=> array("ordre"=>7,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N3:@Score}","Value"=>"")
				,"N4"       		=> array("ordre"=>8,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Maitrise:SubComp:#N4:@Score}","Value"=>"")
				,"Redouble" 		=> array("ordre"=>8,"Label"=>"Nombre de redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@nbrredouble}","Value"=>"")
				,"RAT"				=> array("ordre"=>9,"Label"=>"Nombre de Contrôle","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@RAT}","Value"=>"")
				,"Moy"      		=> array("ordre"=>10,"Label"=>"<b style='color:green;'>MG: Moyenne des années d’études après le BAC</b>","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Ingenieur:SubComp:Model:Moy:@Score})","Value"=>"")
				,"Final"    		=> array("ordre"=>14,"Label"=>"<b style='color:green;'>Score</b>","Type"=>"SET","Malloc"=>"{Ingenieur:@Score}","Value"=>"")
 	
			)
	;

