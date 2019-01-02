<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 28/08/2018
 * Time: 18:39
 */


include(dirname(__FILE__)."/relever1.php"); 



$_Model_Eval['ReleverS1']=$Relever; 
 
 
 
$_Model_Eval['Template']=array(
			"UE1"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Unite}","Value"=>"")
			,"MoyenneUE1"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Moyenne}","Value"=>"")
			,"COEFUE1"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@COEF}","Value"=>"")
            ,"ECUE1"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Unite}","Value"=>"")
            ,"AAECUE1"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Credit}","Value"=>"")
			,"DS1ECUE1"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}","Value"=>"")
            ,"DS2ECUE1"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS2}","Value"=>"")
            ,"MoyenneECUE1"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Moyenne}","Value"=>"")
			,"ECUE2"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Unite}","Value"=>"")
            ,"AAECUE2"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Credit}","Value"=>"")
			,"DS1ECUE2"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}","Value"=>"")
            ,"DS2ECUE2"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS2}","Value"=>"")
            ,"MoyenneECUE2"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Moyenne}","Value"=>"")
           
)
	;

