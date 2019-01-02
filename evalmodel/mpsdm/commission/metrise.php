<?php 



//diplome Licence Appliquee
$Maitrise =array(
    'Name'=>"Maitrise"
    ,"parameters"=>array(

    )
    ,'Label'=>"Maitrise"
    ,"Affiche"=>0
    ,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
            ,'nature'=>"arithmetique"
            ,'toEval'=>" 
                            {Maitrise:AutreInformations:@bacmoyenne}
							+ {Maitrise:AutreInformations:@MG}
							-3*{Maitrise:AutreInformations:@nbrredouble}
							-1.5*{Maitrise:AutreInformations:@RAT} 
						"
            ,"score"=>0
            ,"default"=>0
            ,"description"=>""
            ,"decision"=>""
            ,"bind"=>array("b1"=>"{Maitrise:@Score}")
        )
    )
    ,"From"=>"Model"
    ,'Score'=>""
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>array(    "typediplome"=>""
                                    ,"idcvparcoursetud"=>""
                                    ,"CPAYS"=>""
                                    ,"idlangues"=>""
                                    ,"idtypesdiplome"=>""
                                    ,"idbacplus"=>""
                                    ,"idcandidatcv"=>""
                                    ,"titre"=>""
                                    ,"nbrredouble"=>"0"
                                    ,"id"=>""
                                    ,"BC"=>"0"
                                    ,"credit"=>"0"
                                    ,"BD"=>"0"
                                    ,"BAD"=>"0"
                                    ,"bacmoyenne"=>"0"
                                    ,"BMB"=>"0"
                                    ,"Type"=>"Maitrise"
                                    ,"idcvp"=>"" 
                                    ,"MG"=>"0"
                                    ,"RAT"=>"0"
                                    
                            )
    ,'Model'=>
			array(
 
			    "RAT"=>array(
                    'Name'=>"RAT"
                    ,'Label'=>"Malus rattrapage"
                    ,'Formule'=>array(
                            "F1"=> array(
                             'type'=>'arithmetique'
                            ,'nature'=>"arithmetique"
                            ,'toEval'=>"(MethodEval::SUM({Maitrise:SubComp:Model:NBR_RAT:@Score}))"
                            ,"score"=>array("true"=>1,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>"Passable"
                            ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@RAT}")

                            )
                        )
                    ,'Score'=>""
                    ,'Poid'=>""
                    ,'description'=>""
                    ,'decision'=>""
                    )

                ,"MG"=>array(
                    'Name'=>"MG"
                    ,'Label'=>"Moyenne"
                    ,'Formule'=>array(
                            "F1"=> array(
                                'type'=>'arithmetique'
                                ,'nature'=>"arithmetique"
                                ,'toEval'=>"({Maitrise:SubComp:#N3:@Score}+{Maitrise:SubComp:#N4:@Score})/2"
                                ,"score"=>array("true"=>1,"false"=>0)
                                ,"default"=>0
                                ,"description"=>""
                                ,"decision"=>"Passable"
                                ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MG}")

                            )
                        )
                    ,'Score'=>""
                    ,'Poid'=>""
                    ,'description'=>""
                    ,'decision'=>""
                )  
            
            )
    ,'form'=>array(
         "{Maitrise:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"text"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
            ,"name"=>"{Maitrise:AutreInformations:@bacmoyenne}"
            ,"label"=>"Moyenne de BAC"

        ),"{Maitrise:AutreInformations:@titre}"=>array(
            "type"=>"textarea"
            ,"options"=>array(
            "class"=>array()
            ,"other"=>array(
                        "rows"=>3
                        ,"cols"=>50
                        ,"value"=>""
                        ,"data_Id"=>""
                    )
             )
            ,"name"=>"LA_Titre"
            ,"label"=>"Titre: "
        ), 
        "{Maitrise:AutreInformations:@nbrredouble}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                    ,'min'=>0
                    ,"placeholder"=>"0"

                    ,"step"=>"0"
                    ,"title"=>"Nombre d'année de redoublemment"

                )
            )
                ,"name"=>"Nbr_Redouble"
                ,"label"=>"   Nombre d'année de redoublemment:  "
            ),"{Maitrise:AutreInformations:@id}"=>array(
                "type"=>"hidden"
                ,"options"=>array(
                        "other"=>array(
                            "value"=>""
                        )
                )
            ,"name"=>"{Maitrise:AutreInformations:@id}"
            ,"label"=>"Id cv parcour"

        ),"{Maitrise:AutreInformations:@idcandidatcv}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Maitrise:AutreInformations:@idcandidatcv}"
        ,"label"=>"idcandidatcv"

        ),"{Maitrise:AutreInformations:@CPAYS}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>"TN"
                )
            )
            ,"name"=>"{Maitrise:AutreInformations:@CPAYS}"
            ,"label"=>"CPAYS"

        ),"{Maitrise:AutreInformations:@idlangues}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>"fr"
                    )
                )
            ,"name"=>"{Maitrise:AutreInformations:@idlangues}"
            ,"label"=>"idlangues"

        ),"{Maitrise:AutreInformations:@idtypesdiplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Universitaire"
                )
            )
        ,"name"=>"{Maitrise:AutreInformations:@idtypesdiplome}"
        ,"label"=>"idtypesdiplome"

        ),"{Maitrise:AutreInformations:@idbacplus}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>"4"
                )
            )
            ,"name"=>"{Maitrise:AutreInformations:@idbacplus}"
            ,"label"=>"idbacplus"

        ),"{Maitrise:AutreInformations:@idcvparcoursetud}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>""
                    )
                )
            ,"name"=>"Maitrise:AutreInformations:@idcvparcoursetud}"
            ,"label"=>"idcvparcoursetud"

        ),"{Maitrise:AutreInformations:@typediplome}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>"Maitrise"
                    )
                )
            ,"name"=>"{Maitrise:AutreInformations:@typediplome}"
            ,"label"=>"typediplome"

        ) 
         


    )
    ,"template"=>array(
        "ligne"=>array(
		
					"Formation"    		=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
					,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
					,"Moybac"       	=> array("ordre"=>7,"Label"=>"Moyenne du bac","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@bacmoyenne}","Value"=>"")
					,"N3"       		=> array("ordre"=>7,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N3:@Score}","Value"=>"")
					,"N4"       		=> array("ordre"=>8,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Maitrise:SubComp:#N4:@Score}","Value"=>"")
					,"Redouble" 		=> array("ordre"=>8,"Label"=>"Nombre de redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@nbrredouble}","Value"=>"")
					,"RAT"				=> array("ordre"=>9,"Label"=>"Nombre de Contrôle","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@RAT}","Value"=>"")
 					,"Moy"      		=> array("ordre"=>10,"Label"=>"<b style='color:green;'>MG: Moyenne des années d’études après le BAC</b>","Type"=>"EVAL","Malloc"=>"{Ingenieur:AutreInformations:@MG}","Value"=>"")
					,"Final"    		=> array("ordre"=>14,"Label"=>"<b style='color:green;'>Score</b>","Type"=>"SET","Malloc"=>"{Ingenieur:@Score}","Value"=>"")
		
         
		)
        ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
            ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
);


$text = file_get_contents(dirname(__FILE__)."/../comp_niveau.php");
 
$Label[3]="3éme année";
$Label[4]="4éme année sans PFE";


for($i=3; $i<=4;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Maitrise['SubComp']['N$i']=$Niveau;");

}
