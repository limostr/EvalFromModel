<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 28/08/2018
 * Time: 18:39
 */


include(dirname(__FILE__)."/metrise.php");
include(dirname(__FILE__)."/licence.php");
 
include(dirname(__FILE__)."/ingenieur.php");



$_Model_Eval['Licence']=$Licence;
$_Model_Eval['Maitrise']=$Maitrise;
$_Model_Eval['Ingenieur']=$Ingenieur;
 
$choixpoid=array(
				'Doctorat' => 5
				, 'Technicien'=>1
				, 'Ingénieur' => 4
 
				, 'Maîtrise' => 3
				, 'Appliqué' => 3
				, 'Fondamentale' => 3
				, 'DUT' => 3
			);
 
$_Model_Eval['Template']=array(
    "Formation"    	=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
,"N1"       		=> array("ordre"=>5,"Label"=>"Moy.1","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N1:@Score}","Value"=>"")
,"N2"       		=> array("ordre"=>6,"Label"=>"Moy.2","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N2:@Score}","Value"=>"")
,"N3"       		=> array("ordre"=>7,"Label"=>"Moy.3","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N3:@Score}","Value"=>"")
,"N4"       		=> array("ordre"=>7,"Label"=>"Moy.4","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N4:@Score}","Value"=>"")
,"Redouble" 		=> array("ordre"=>8,"Label"=>"Redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@nbrredouble}","Value"=>"")
,"Malus"      		=> array("ordre"=>11,"Label"=>"Malus","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Malus}","Value"=>"")
,"BS"				=> array("ordre"=>9,"Label"=>"BS","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BS}","Value"=>"")
,"Moy"      		=> array("ordre"=>10,"Label"=>"MG","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Ingenieur:SubComp:Model:Moy:@Score})","Value"=>"")
,"BM"      		    => array("ordre"=>10,"Label"=>"BM","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BM}","Value"=>"")
 ,"Final"    		=> array("ordre"=>14,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Ingenieur:@Score}","Value"=>"")

)
	;

