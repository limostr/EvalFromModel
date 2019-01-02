<?php



//diplome Master Appliquee
$Master =array(
    'Name'=>"Master"
	,"parameters"=>array(

    )
		,'Label'=>"Master"
		,"Affiche"=>0
		,'Formule'=>array(
				"F1"=>array(
					'type'=>'arithmetique'
				,'nature'=>"arithmetique"
				,'toEval'=>" 
									{Master:AutreInformations:@bacmoyenne}
									+ {Master:AutreInformations:@MG}
									- 3*{Master:AutreInformations:@nbrredouble}
									- 1.5*{Master:AutreInformations:@RAT} 
								"
				,"score"=>0
				,"default"=>0
				,"description"=>""
				,"decision"=>""
				,"bind"=>array("b1"=>"{Master:@Score}")
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
    ,"Type"=>"Master"
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
						,'toEval'=>"(MethodEval::SUM({Master:SubComp:Model:NBR_RAT:@Score}))"
						,"score"=>array("true"=>1,"false"=>0)
						,"default"=>0
						,"description"=>""
						,"decision"=>"Passable"
						,"bind"=>array("b1"=>"{Master:AutreInformations:@RAT}") 
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
						,'toEval'=>"({Master:SubComp:#N1:@Score}+{Master:SubComp:#N2:@Score})/2"
						,"score"=>array("true"=>1,"false"=>0)
						,"default"=>0
						,"description"=>""
						,"decision"=>"Passable"
						,"bind"=>array("b1"=>"{Master:AutreInformations:@MG}")

					)
				)
			,'Score'=>""
			,'Poid'=>""
			,'description'=>""
			,'decision'=>""
        ) 
         
        )
,'form'=>array(
        "{Master:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"text"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
            ,"name"=>"{Master:AutreInformations:@bacmoyenne}"
            ,"label"=>"Moyenne de BAC"

        ),"{Master:AutreInformations:@titre}"=>array(
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
        "{Master:AutreInformations:@nbrredouble}"=>array(
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
        ),"{Master:AutreInformations:@id}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Master:AutreInformations:@id}"
        ,"label"=>"Id cv parcour"

        ), "{Master:AutreInformations:@idcandidatcv}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Master:AutreInformations:@idcandidatcv}"
        ,"label"=>"idcandidatcv"

        ),"{Master:AutreInformations:@CPAYS}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"TN"
                )
            )
        ,"name"=>"{Master:AutreInformations:@CPAYS}"
        ,"label"=>"CPAYS"

        ),"{Master:AutreInformations:@idlangues}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"fr"
                )
            )
        ,"name"=>"{Master:AutreInformations:@idlangues}"
        ,"label"=>"idlangues"

        ),"{Master:AutreInformations:@idtypesdiplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Universitaire"
                )
            )
        ,"name"=>"{Master:AutreInformations:@idtypesdiplome}"
        ,"label"=>"idtypesdiplome"

        ),"{Master:AutreInformations:@idbacplus}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"4"
                )
            )
        ,"name"=>"{Master:AutreInformations:@idbacplus}"
        ,"label"=>"idbacplus"

        ),"{Master:AutreInformations:@idcvparcoursetud}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"Master:AutreInformations:@idcvparcoursetud}"
        ,"label"=>"idcvparcoursetud"

        ),"{Master:AutreInformations:@typediplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Master"
                )
            )
        ,"name"=>"{Master:AutreInformations:@typediplome}"
        ,"label"=>"typediplome"

        ) 


    )
,"template"=>array(
        "ligne"=>array(
		
				"Formation"    		=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Master:AutreInformations:@titre}","Value"=>"")
				,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Master:AutreInformations:@Type}","Value"=>"")
				,"Moybac"       	=> array("ordre"=>7,"Label"=>"<b style='color:green;'>Moyenne du bac</b>","Type"=>"SET","Malloc"=>"{Master:AutreInformations:@bacmoyenne}","Value"=>"")
				,"N1"       		=> array("ordre"=>7,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Master:SubComp:#N1:@Score}","Value"=>"")
				,"N2"       		=> array("ordre"=>8,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Master:SubComp:#N2:@Score}","Value"=>"")
				,"Redouble" 		=> array("ordre"=>8,"Label"=>"Nombre de redoublement","Type"=>"SET","Malloc"=>"{Master:AutreInformations:@nbrredouble}","Value"=>"")
				,"RAT"				=> array("ordre"=>9,"Label"=>"Nombre de Contrôle","Type"=>"SET","Malloc"=>"{Master:AutreInformations:@RAT}","Value"=>"")
				,"Moy"      		=> array("ordre"=>10,"Label"=>"<b style='color:green;'>MG: Moyenne des années d’études après le BAC</b>","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Master:SubComp:Model:Moy:@Score})","Value"=>"")
				,"Final"    		=> array("ordre"=>14,"Label"=>"<b style='color:green;'>Score</b>","Type"=>"SET","Malloc"=>"{Master:@Score}","Value"=>"")
 

		)
    ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
);


$text = file_get_contents(dirname(__FILE__)."/../comp_niveau.php");

$Label[1]="1ére année";
$Label[2]="S1 de la 2éme année(Sans PFE)";


for($i=1; $i<=2;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Master['SubComp']['N$i']=$Niveau;");

}
