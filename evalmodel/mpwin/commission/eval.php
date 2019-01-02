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



$_Model_Eval['Licence']=$Licence;
$_Model_Eval['Maitrise']=$Maitrise;
$_Model_Eval['Ingenieur']=$Ingenieur;
$_Model_Eval['Technicien']=$Technicien;

 
$_Model_Eval['Template']=array(
								"Formation"    		=> array("ordre"=>1,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
								,"TypeDiplome"  	=> array("ordre"=>2,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
								,"N1"       		=> array("ordre"=>3,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N1:@Score}","Value"=>"")
								,"N2"       		=> array("ordre"=>4,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N2:@Score}","Value"=>"")
								,"N3"       		=> array("ordre"=>5,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N3:@Score}","Value"=>"")
								,"N4"       		=> array("ordre"=>6,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N4:@Score}","Value"=>"")
								,"Redouble" 		=> array("ordre"=>7,"Label"=>"Nombre de redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@nbrredouble}","Value"=>"")
								,"MR1"      		=> array("ordre"=>8,"Label"=>"MR1","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@MR1}","Value"=>"")
								,"RAT"				=> array("ordre"=>9,"Label"=>"Nombre de Contrôle","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@RAT}","Value"=>"")
								,"MR2"      		=> array("ordre"=>10,"Label"=>"MR2","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@MR2}","Value"=>"")
								,"MR"       		=> array("ordre"=>11,"Label"=>"MR","Type"=>"EVAL","Malloc"=>"{Ingenieur:AutreInformations:@MR1}+{Ingenieur:AutreInformations:@MR2}","Value"=>"")
								,"Moy"      		=> array("ordre"=>12,"Label"=>"MG","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Ingenieur:SubComp:Model:Moy:@Score})","Value"=>"")
								,"BMU"      		=> array("ordre"=>13,"Label"=>"BMU","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BMU}","Value"=>"")
								,"BAC"      		=> array("ordre"=>14,"Label"=>"Moyenne de bac","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@bacmoyenne}","Value"=>"")
								,"BMB"  			=> array("ordre"=>15,"Label"=>"Bonus selon la mention du BAC","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BMB}","Value"=>"")
								,"BEP"    			=> array("ordre"=>16,"Label"=>"Bonus selon l’expérience professionnelle en informatique ","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BEP}","Value"=>"")
								,"QD"    			=> array("ordre"=>17,"Label"=>"Qualité du dossier du candidat ","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@QD}","Value"=>"")
								
								,"Final"    		=> array("ordre"=>18,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Ingenieur:@Score}","Value"=>"")
								//,"ManualScore"		=> array("ordre"=>18,"Label"=>"FormuleXLS","Type"=>"XLS","Value"=>"
								//	=(R{ind}*(1-(N{ind}+P{ind}))+S{ind}+U{ind}+V{ind}+W{ind} 
								//")
								
								
			)
	;

