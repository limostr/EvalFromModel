<?php 



//diplome Licence Appliquee
$Ingenieur =array(
    'Name'=>"Ingenieur"
    ,"parameters"=>array(

    )
    ,'Label'=>"Ingenieur"
    ,"Affiche"=>0
    ,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
            ,'nature'=>"arithmetique"
            ,'toEval'=>" 
                             {Ingenieur:AutreInformations:@bacmoyenne}
							+ {Ingenieur:AutreInformations:@MG}
							- 3*{Ingenieur:AutreInformations:@nbrredouble}
							- 1.5*{Ingenieur:AutreInformations:@RAT} 
						"
            ,"score"=>0
            ,"default"=>0
            ,"description"=>""
            ,"decision"=>""
            ,"bind"=>array("b1"=>"{Ingenieur:@Score}")
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
                                    ,"Type"=>"Ingenieur"
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
                            ,'toEval'=>"(MethodEval::SUM({Ingenieur:SubComp:Model:NBR_RAT:@Score}))"
                            ,"score"=>array("true"=>1,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>"Passable"
                            ,"bind"=>array("b1"=>"{Ingenieur:AutreInformations:@RAT}")

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
                                ,'toEval'=>"({Ingenieur:SubComp:#N2:@Score}+{Ingenieur:SubComp:#N3:@Score})/2"
                                ,"score"=>array("true"=>1,"false"=>0)
                                ,"default"=>0
                                ,"description"=>""
                                ,"decision"=>"Passable"
                                ,"bind"=>array("b1"=>"{Ingenieur:AutreInformations:@MG}")

                            )
                        )
                    ,'Score'=>""
                    ,'Poid'=>""
                    ,'description'=>""
                    ,'decision'=>""
                )
            )
    ,'form'=>array(
        "{Ingenieur:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"text"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
            ,"name"=>"{Maitrise:AutreInformations:@bacmoyenne}"
            ,"label"=>"Moyenne de BAC"

        ),"{Ingenieur:AutreInformations:@titre}"=>array(
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
        "{Ingenieur:AutreInformations:@nbrredouble}"=>array(
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
            ),"{Ingenieur:AutreInformations:@id}"=>array(
                "type"=>"hidden"
                ,"options"=>array(
                        "other"=>array(
                            "value"=>""
                        )
                )
            ,"name"=>"{Ingenieur:AutreInformations:@id}"
            ,"label"=>"Id cv parcour"

        ) ,"{Ingenieur:AutreInformations:@idcandidatcv}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Ingenieur:AutreInformations:@idcandidatcv}"
        ,"label"=>"idcandidatcv"

        ),"{Ingenieur:AutreInformations:@CPAYS}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>"TN"
                )
            )
            ,"name"=>"{Ingenieur:AutreInformations:@CPAYS}"
            ,"label"=>"CPAYS"

        ),"{Ingenieur:AutreInformations:@idlangues}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>"fr"
                    )
                )
            ,"name"=>"{Ingenieur:AutreInformations:@idlangues}"
            ,"label"=>"idlangues"

        ),"{Ingenieur:AutreInformations:@idtypesdiplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Universitaire"
                )
            )
        ,"name"=>"{Ingenieur:AutreInformations:@idtypesdiplome}"
        ,"label"=>"idtypesdiplome"

        ),"{Ingenieur:AutreInformations:@idbacplus}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>"4"
                )
            )
            ,"name"=>"{Ingenieur:AutreInformations:@idbacplus}"
            ,"label"=>"idbacplus"

        ),"{Ingenieur:AutreInformations:@idcvparcoursetud}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>""
                    )
                )
            ,"name"=>"Ingenieur:AutreInformations:@idcvparcoursetud}"
            ,"label"=>"idcvparcoursetud"

        ),"{Ingenieur:AutreInformations:@typediplome}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>"Ingenieur"
                    )
                )
            ,"name"=>"{Ingenieur:AutreInformations:@typediplome}"
            ,"label"=>"typediplome"

        ) 


    )
    ,"template"=>array(
        "ligne"=>array(
				"Formation"    		=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
				,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
				,"Moybac"       	=> array("ordre"=>7,"Label"=>"Moyenne du bac","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@bacmoyenne}","Value"=>"")
				,"N2"       		=> array("ordre"=>7,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N2:@Score}","Value"=>"")
				,"N3"       		=> array("ordre"=>8,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Maitrise:SubComp:#N3:@Score}","Value"=>"")
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
$Label[3]="3éme année sans pfe";


for($i=2; $i<=3;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Ingenieur['SubComp']['N$i']=$Niveau;");

}
