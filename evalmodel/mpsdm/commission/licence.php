<?php



//diplome Licence Appliquee
$Licence =array(
    'Name'=>"Licence"
,"parameters"=>array(

    )
,'Label'=>"Licence"
,"Affiche"=>0
,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
        ,'nature'=>"arithmetique"
        ,'toEval'=>" 
                            {Maitrise:AutreInformations:@bacmoyenne}
							+ {Maitrise:AutreInformations:@MG}
							- 3*{Maitrise:AutreInformations:@nbrredouble}
							- 1.5*{Maitrise:AutreInformations:@RAT} 
						"
        ,"score"=>0
        ,"default"=>0
        ,"description"=>""
        ,"decision"=>""
        ,"bind"=>array("b1"=>"{Licence:@Score}")
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
    ,"Type"=>"Licence"
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
						,'toEval'=>"(MethodEval::SUM({Licence:SubComp:Model:NBR_RAT:@Score}))"
						,"score"=>array("true"=>1,"false"=>0)
						,"default"=>0
						,"description"=>""
						,"decision"=>"Passable"
						,"bind"=>array("b1"=>"{Licence:AutreInformations:@RAT}") 
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
						,'toEval'=>"({Licence:SubComp:#N2:@Score}+{Licence:SubComp:#N3:@Score})/2"
						,"score"=>array("true"=>1,"false"=>0)
						,"default"=>0
						,"description"=>""
						,"decision"=>"Passable"
						,"bind"=>array("b1"=>"{Licence:AutreInformations:@MG}")

					)
				)
			,'Score'=>""
			,'Poid'=>""
			,'description'=>""
			,'decision'=>""
        ) 
         
        )
,'form'=>array(
        "{Licence:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"text"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
            ,"name"=>"{Licence:AutreInformations:@bacmoyenne}"
            ,"label"=>"Moyenne de BAC"

        ),"{Licence:AutreInformations:@titre}"=>array(
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
        "{Licence:AutreInformations:@nbrredouble}"=>array(
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
        ),"{Licence:AutreInformations:@id}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Licence:AutreInformations:@id}"
        ,"label"=>"Id cv parcour"

        ), "{Licence:AutreInformations:@idcandidatcv}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Licence:AutreInformations:@idcandidatcv}"
        ,"label"=>"idcandidatcv"

        ),"{Licence:AutreInformations:@CPAYS}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"TN"
                )
            )
        ,"name"=>"{Licence:AutreInformations:@CPAYS}"
        ,"label"=>"CPAYS"

        ),"{Licence:AutreInformations:@idlangues}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"fr"
                )
            )
        ,"name"=>"{Licence:AutreInformations:@idlangues}"
        ,"label"=>"idlangues"

        ),"{Licence:AutreInformations:@idtypesdiplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Universitaire"
                )
            )
        ,"name"=>"{Licence:AutreInformations:@idtypesdiplome}"
        ,"label"=>"idtypesdiplome"

        ),"{Licence:AutreInformations:@idbacplus}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"4"
                )
            )
        ,"name"=>"{Licence:AutreInformations:@idbacplus}"
        ,"label"=>"idbacplus"

        ),"{Licence:AutreInformations:@idcvparcoursetud}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"Licence:AutreInformations:@idcvparcoursetud}"
        ,"label"=>"idcvparcoursetud"

        ),"{Licence:AutreInformations:@typediplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Licence"
                )
            )
        ,"name"=>"{Licence:AutreInformations:@typediplome}"
        ,"label"=>"typediplome"

        ) 


    )
,"template"=>array(
        "ligne"=>array(
		
				"Formation"    		=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
				,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
				,"Moybac"       	=> array("ordre"=>7,"Label"=>"<b style='color:green;'>Moyenne du bac</b>","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@bacmoyenne}","Value"=>"")
				,"N2"       		=> array("ordre"=>7,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N2:@Score}","Value"=>"")
				,"N3"       		=> array("ordre"=>8,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Maitrise:SubComp:#N3:@Score}","Value"=>"")
				,"Redouble" 		=> array("ordre"=>8,"Label"=>"Nombre de redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@nbrredouble}","Value"=>"")
				,"RAT"				=> array("ordre"=>9,"Label"=>"Nombre de Contrôle","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@RAT}","Value"=>"")
				,"Moy"      		=> array("ordre"=>10,"Label"=>"<b style='color:green;'>MG: Moyenne des années d’études après le BAC</b>","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Ingenieur:SubComp:Model:Moy:@Score})","Value"=>"")
				,"Final"    		=> array("ordre"=>14,"Label"=>"<b style='color:green;'>Score</b>","Type"=>"SET","Malloc"=>"{Ingenieur:@Score}","Value"=>"")
 

		)
    ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
);


$text = file_get_contents(dirname(__FILE__)."/../comp_niveau.php");

//$Label[1]="1ére année";
$Label[2]="2éme année";
$Label[3]="S1 de la 3éme année(Sans PFE)";

for($i=2; $i<=3;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Licence['SubComp']['N$i']=$Niveau;");

}
