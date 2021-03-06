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
                MethodEval::MOYART({Licence:SubComp:Model:Moy:@Score}) * ({Licence:AutreInformations:@Malus}) 
                + {Licence:AutreInformations:@BS} 
                + {Licence:AutreInformations:@BM} 
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

            ,
                "MG"=>array(
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

     "{Ingenieur:AutreInformations:@titre}"=>array(
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
        ), "{Ingenieur:AutreInformations:@BAD}"=>array(
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

                ,"name"=>"{Ingenieur:AutreInformations:@BAD}"
                ,"label"=>"Année de diplôme : "

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

        ),"{Ingenieur:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
            ,"name"=>"{Ingenieur:AutreInformations:@bacmoyenne}"
            ,"label"=>"bacmoyenne"

        ),"{Ingenieur:AutreInformations:@idcandidatcv}"=>array(
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
$Label[3]="3éme année sans pfe";


for($i=1; $i<=3;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Ingenieur['SubComp']['N$i']=$Niveau;");

}
