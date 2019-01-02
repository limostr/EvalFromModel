<?php



//diplome Master Appliquee
$Master =array(
    'Name'=>"Licence"
,"parameters"=>array(

    )
,'Label'=>"Master-Licence"
,"Affiche"=>0
,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
        ,'nature'=>"arithmetique"
        ,'toEval'=>" 
                MethodEval::MOYART({Master:SubComp:Model:Moy:@Score}) * ({Master:AutreInformations:@Malus}) 
                + {Master:AutreInformations:@BS} 
                + {Master:AutreInformations:@BM}
                + {Master:AutreInformations:@BEP}
                + {Master:AutreInformations:@BADP} 
                + {Master:AutreInformations:@BEPFPP} 
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
,'AutreInformations'=>array(
        "typediplome"=>""
        ,"idcvparcoursetud"=>""
        ,"CPAYS"=>""
        ,"idlangues"=>""
        ,"idtypesdiplome"=>""
        ,"idbacplus"=>""
        ,"idcandidatcv"=>""
        ,"titre"=>""
        ,"nbrredouble"=>"0"
        ,"id"=>""
        ,"BD"=>"0"
        ,"BAD"=>"0"
        ,"bacmoyenne"=>"0"
        ,"BMB"=>"0"
        ,"Type"=>"Master"
        ,"idcvp"=>""
        ,"BEP"=>"0"
        ,"BADP"=>"0"
        ,"BEPFPP"=>"0"
        ,"BS"=>"0"
        ,"BM"=>"0"
        ,"Malus"=>""
    ,"MG"=>0
    )
,'Model'=>
        array(

            "BS"=>array(
                'Name'=>"BS"
                ,'Label'=>"Bonus session "
                ,'Formule'=>array(
                    "F1"=> array(
                         'type'=>'arithmetique'
                        ,'nature'=>"arithmetique"
                        ,'toEval'=>"(MethodEval::MOYART({Master:SubComp:Model:BS:@Score}))"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>"Bonus"
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{Master:AutreInformations:@BS}")
                    )
                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
            )
        , "BM"=>array(
            'Name'=>"BM"
            ,'Label'=>"Bonus mention "
            ,'Formule'=>array(
                "F1"=> array(
                    'type'=>'arithmetique'
                    ,'nature'=>"arithmetique"
                    ,'toEval'=>"(MethodEval::MOYART({Master:SubComp:Model:BM:@Score}))"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Bonus"
                    ,"bind"=>array("b1"=>"{Master:AutreInformations:@BM}")
                )
            )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
        )

        ,  "MG"=>array(
            'Name'=>"MG"
            ,'Label'=>"Moyenne"
            ,'Formule'=>array(
                "F1"=> array(
                    'type'=>'arithmetique'
                    ,'nature'=>"arithmetique"
                    ,'toEval'=>"MethodEval::MOYART({Master:SubComp:Model:Moy:@Score})"
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
        )  ,
        "Malus"=>array(
            'Name'=>"Malus"
            ,'Label'=>"Malus redoublement"
            ,'Formule'=>array(

                "F1"=> array(
                    'type'=>'logique'
                    ,'nature'=>"if"
                    ,'toEval'=>"{Master:AutreInformations:@nbrredouble} == 0"
                    ,"score"=>array("true"=> 1 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Master:AutreInformations:@Malus}")
                ),"F2"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Master:AutreInformations:@nbrredouble} == 1"
                    ,"score"=>array("true"=> 0.9 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Master:AutreInformations:@Malus}")
                ),"F3"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Master:AutreInformations:@nbrredouble} == 2"
                    ,"score"=>array("true"=>0.8,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Master:AutreInformations:@Malus}")
                ),"F4"=> array(
                            'type'=>'logique'
							,'nature'=>"else"
							,'toEval'=>"{Master:AutreInformations:@nbrredouble} > 2"
							,"score"=>array("true"=>0,"false"=>0)
							,"default"=>0
							,"description"=>""
							,"decision"=>""
							,"bind"=>array("b1"=>"{Master:AutreInformations:@Malus}")
                        )
            )
        ,'Score'=>""
        ,'Poid'=>""
        ,'description'=>""
        ,'decision'=>"Malus redoublement"

        )
        )
,'form'=>array(
        "{Master:AutreInformations:@BEP}"=>array(
            "type"=>"number"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                ,"max"=>2
                ,'min'=>0
                ,"placeholder"=>"0"
                ,"step"=>"0"
                ,"title"=>"Bonus d’études pertinentes "
                )
            )
        ,"name"=>"{Master:AutreInformations:@BEP}"
        ,"label"=>"<b style='color:green'>Bonus d’études pertinentes : </b>"
            //,"init"=> "MethodEval::ExPro({Master:database:init:#idUser})"
        ) ,"{Master:AutreInformations:@BADP}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>1
                    ,'min'=>0
                    ,"placeholder"=>"0"
                    ,"step"=>"0"
                    ,"title"=>"Bonus d’autres diplômes pertinents "
                )
            )
        ,"name"=>"{Master:AutreInformations:@BADP}"
        ,"label"=>"<b style='color:green'>Bonus d’autres diplômes pertinents: </b>"

        ),"{Master:AutreInformations:@BEPFPP}"=>array(
            "type"=>"number"
        ,"options"=>array(
                "other"=>array(
                    "max"=>2
                ,'min'=>0
                ,"placeholder"=>"0"
                ,"step"=>"0"
                ,"title"=>"Expérience professionnelle et/ou formation(s) professionnalisante(s) pertinente(s) "
                )
            )
        ,"name"=>"{Master:AutreInformations:@BEPFPP}"
        ,"label"=>"<b style='color:green'>Expérience professionnelle et/ou formation(s) professionnalisante(s) pertinente(s): </b>"

        )
        ,"{Master:AutreInformations:@titre}"=>array(
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
        ), "{Master:AutreInformations:@BAD}"=>array(
            "type"=>"text"
        ,"options"=>array(
                "other"=>array(

                  "placeholder"=>"Année"
                    ,"required"=>"required"
                    ,"title"=>"Format (Exp 2017): "
                   /* ,"pattern"=>"^\d{4}$"
                    ,"onblur"=>"this.style.backgroundColor=/^\d{4}$/.test(this.value)?'inherit':'red'"
*/               
			   )
            )

        ,"name"=>"{Master:AutreInformations:@BAD}"
        ,"label"=>"Année de diplôme : "

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
        ,"label"=>"Nombre d'année de redoublemment:  "
        ),"{Master:AutreInformations:@id}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Master:AutreInformations:@id}"
        ,"label"=>"Id cv parcour"

        ) ,"{Master:AutreInformations:@idcandidatcv}"=>array(
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
                    "value"=>"Licence"
                )
            )
        ,"name"=>"{Master:AutreInformations:@typediplome}"
        ,"label"=>"typediplome"

        )



    )
,"template"=>array(
        "ligne"=>array(
		
				"Formation"    	=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
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
    ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
);


$text = file_get_contents(dirname(__FILE__)."/../comp_niveau.php");

$Label[1]="1ére année";
$Label[2]="2éme année";
$Label[3]="S1 de la 3éme année(Sans PFE)";

for($i=1; $i<=3;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Master['SubComp']['N$i']=$Niveau;");

}
