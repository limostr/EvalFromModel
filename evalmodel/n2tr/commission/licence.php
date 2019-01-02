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
                MethodEval::MOYART({Licence:SubComp:Model:Moy:@Score}) * ({Licence:AutreInformations:@Malus}) 
                + {Licence:AutreInformations:@BS} 
                + {Licence:AutreInformations:@BM} 
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
        ,"Type"=>"Licence"
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
                        ,'toEval'=>"(MethodEval::MOYART({Licence:SubComp:Model:BS:@Score}))"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>"Bonus"
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BS}")
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
                    ,'toEval'=>"(MethodEval::MOYART({Licence:SubComp:Model:BM:@Score}))"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Bonus"
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BM}")
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
                    ,'toEval'=>"MethodEval::MOYART({Licence:SubComp:Model:Moy:@Score})"
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
        )  ,
            "Malus"=>array(
                'Name'=>"Malus"
            ,'Label'=>"Malus redoublement"
            ,'Formule'=>array(

                    "F1"=> array(
                        'type'=>'logique'
                    ,'nature'=>"if"
                    ,'toEval'=>"{Licence:AutreInformations:@nbrredouble} == 0"
                    ,"score"=>array("true"=> 1 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@Malus}")
                    ),"F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@nbrredouble} == 1"
                    ,"score"=>array("true"=> 0.8 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@Malus}")
                    ),"F3"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@nbrredouble} == 2"
                    ,"score"=>array("true"=>0.6,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@Malus}")
                    ),"F4"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@nbrredouble} >= 3"
                    ,"score"=>array("true"=>0.4,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@Malus}")
                    )
                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>"Malus redoublement"

            )
        )
,'form'=>array(
         "{Licence:AutreInformations:@titre}"=>array(
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
        ), "{Licence:AutreInformations:@BAD}"=>array(
            "type"=>"text"
        ,"options"=>array(
                "other"=>array(

                  "placeholder"=>"Année"
                    ,"required"=>"required"
                   /* ,"title"=>"Format (Exp 2017): "
                    ,"pattern"=>"^\d{4}$"
                    ,"onblur"=>"this.style.backgroundColor=/^\d{4}$/.test(this.value)?'inherit':'red'"*/
                )
            )

        ,"name"=>"{Licence:AutreInformations:@BAD}"
        ,"label"=>"Année de diplôme : "

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
        ,"label"=>"Nombre d'année de redoublemment:  "
        ),"{Licence:AutreInformations:@id}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Licence:AutreInformations:@id}"
        ,"label"=>"Id cv parcour"

        ) ,"{Licence:AutreInformations:@idcandidatcv}"=>array(
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
$Label[3]="3éme année";

for($i=1; $i<=3;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Licence['SubComp']['N$i']=$Niveau;");

}
