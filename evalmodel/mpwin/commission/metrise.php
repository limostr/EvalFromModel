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
                            MethodEval::MOYART({Maitrise:SubComp:Model:Moy:@Score})*(1-({Maitrise:AutreInformations:@MR1}+{Maitrise:AutreInformations:@MR2})) 
							+ {Maitrise:AutreInformations:@BMU} 
							+ {Maitrise:AutreInformations:@BMB}
							+ {Maitrise:AutreInformations:BEP}
							+ {Maitrise:AutreInformations:@QD} 
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
                                    ,"MR1"=>"0"
                                    ,"MR2"=>"0"
                                    ,"MR"=>"0"
                                    ,"MG"=>"0"
                                    ,"RAT"=>"0"
                                    ,"BMU"=>"0"
                                    ,"QD"=>"0"
                                    ,"BEP"=>""
                                    ,"EXP"=>"0"
                            )
    ,'Model'=>
			array(

                "BEP"=>array(
                    'Name'=>"BEP"
                ,'Label'=>"Bonus selon l’expérience professionnelle en informatique "
                ,'Formule'=>array(

                        "F1"=> array(
                            'type'=>'logique'
                        ,'nature'=>"if"
                        ,'toEval'=>"{Maitrise:AutreInformations:@EXP} == 1"
                        ,"score"=>array("true"=> 1 ,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BEP}")
                        ),"F2"=> array(
                            'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Maitrise:AutreInformations:@EXP} == 2"
                        ,"score"=>array("true"=>2,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BEP}")
                        ),
                        "F3"=> array(
                            'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Maitrise:AutreInformations:@EXP}>=3"
                        ,"score"=>array("true"=>3,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BEP}")
                        )

                    )
                ,'Score'=>""
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>"Bonus selon l’expérience professionnelle en informatique"

                ) ,
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
                                ,'toEval'=>"MethodEval::MOYART({Maitrise:SubComp:Model:Moy:@Score})"
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
                ), "BMB"=>array(
                'Name'=>"BMB"
                ,'Label'=>"Bonus selon la mention du BAC"
                ,'Formule'=>array(
                    "F1"=> array(
                        'type'=>'logique'
                        ,'nature'=>"if"
                        ,'toEval'=>"{Maitrise:AutreInformations:@bacmoyenne}>=10 && {Maitrise:AutreInformations:@bacmoyenne} <12"
                        ,"score"=>array("true"=>0,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Passable"
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BMB}")
                    ),
                    "F2"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Maitrise:AutreInformations:@bacmoyenne}>=12 && {Maitrise:AutreInformations:@bacmoyenne} <14"
                        ,"score"=>array("true"=>0.5,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Assez bien"
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BMB}")
                    ),
                    "F3"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Maitrise:AutreInformations:@bacmoyenne}>=14 && {Maitrise:AutreInformations:@bacmoyenne} <16"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Bien"
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BMB}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Maitrise:AutreInformations:@bacmoyenne}>=16"
                        ,"score"=>array("true"=>2,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Trés Bien"
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BMB}")
                    )
                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>"Bonus selon la mention du BAC"

                ),
                "MR1"=>array(
                    'Name'=>"MR1"
                    ,'Label'=>"Malus redoublement"
                    ,'Formule'=>array(

                        "F1"=> array(
                            'type'=>'logique'
                            ,'nature'=>"if"
                            ,'toEval'=>"{Maitrise:AutreInformations:@nbrredouble} == 1"
                            ,"score"=>array("true"=> 0.1 ,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MR1}")
                        ),"F2"=> array(
                            'type'=>'logique'
                            ,'nature'=>"else"
                            ,'toEval'=>"{Maitrise:AutreInformations:@nbrredouble} == 2"
                            ,"score"=>array("true"=>0.2,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MR1}")
                        ),
                        "F4"=> array(
                            'type'=>'logique'
                            ,'nature'=>"else"
                            ,'toEval'=>"{Maitrise:AutreInformations:@nbrredouble}>=3"
                            ,"score"=>array("true"=>0.3,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MR1}")
                        )

                    )
                ,'Score'=>""
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>"Malus redoublement"

                ) ,
                "MR2"=>array(
                    'Name'=>"MR2"
                    ,'Label'=>"Malus rattrapage"
                    ,'Formule'=>array(
                            "F1"=> array(
                                'type'=>'logique'
                            ,'nature'=>"if"
                            ,'toEval'=>"{Maitrise:AutreInformations:@RAT}==0"
                            ,"score"=>array("true"=>0,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MR2}")
                            ),
                            "F2"=> array(
                                'type'=>'logique'
                            ,'nature'=>"else"
                            ,'toEval'=>"{Maitrise:AutreInformations:@RAT}==1"
                            ,"score"=>array("true"=>0.05,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MR2}")
                            ),"F3"=> array(
                                'type'=>'logique'
                                ,'nature'=>"else"
                                ,'toEval'=>"{Maitrise:AutreInformations:@RAT}==2"
                                ,"score"=>array("true"=>0.1,"false"=>0)
                                ,"default"=>0
                                ,"description"=>""
                                ,"decision"=>""
                                ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MR2}")
                            ),
                            "F4"=> array(
                                'type'=>'logique'
                                ,'nature'=>"else"
                                ,'toEval'=>"{Maitrise:AutreInformations:@RAT}>=3"
                                ,"score"=>array("true"=>0.15,"false"=>0)
                                ,"default"=>0
                                ,"description"=>""
                                ,"decision"=>""
                                ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@MR2}")
                            )

                        )
                    ,'Score'=>""
                    ,'Poid'=>""
                    ,'description'=>""
                    ,'decision'=>"Malus rattrapage"

            )
            ,
                "BMU"=>array(
                'Name'=>"BMU"
                ,'Label'=>"Malus rattrapage"
                ,'Formule'=>array(
                    "F1"=> array(
                        'type'=>'arithmetique'
                        ,'nature'=>"arithmetique"
                        ,'toEval'=>"MethodEval::SUM({Maitrise:SubComp:Model:BM:@Score})"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{Maitrise:AutreInformations:@BMU}")

                    )
                )
                ,'Score'=>""
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>"Malus rattrapage"

                )
            )
    ,'form'=>array(
        "{Maitrise:AutreInformations:@titre}"=>array(
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
        ), "{Maitrise:AutreInformations:@BAD}"=>array(
                "type"=>"text"
                ,"options"=>array(
                "other"=>array(

                "placeholder"=>"Année"
                    ,"required"=>"required"
                    ,"title"=>"Format (Exp 2017-2018): "
                    //,"pattern"=>"^\d{4}$"
                   // ,"onblur"=>"this.style.backgroundColor=/^\d{4}$/.test(this.value)?'inherit':'red'"
                )
            )

                ,"name"=>"{Maitrise:AutreInformations:@BAD}"
                ,"label"=>"Année de diplôme : "

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

        ),"{Maitrise:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
            ,"name"=>"{Maitrise:AutreInformations:@bacmoyenne}"
            ,"label"=>"bacmoyenne"

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

        ),
        "{Maitrise:AutreInformations:@EXP}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                    ,'min'=>0
                      ,"placeholder"=>"00.00" 
                    ,"step"=>"0.01"
                    ,"title"=>"Nombre d'année d’expérience professionnelle en informatique "
                )
            )
        ,"name"=>"{Maitrise:AutreInformations:@EXP}"
        ,"label"=>"Nombre d'année d’expérience professionnelle en informatique: "
        ,"init"=> "MethodEval::ExPro({Maitrise:database:init:#idUser})"
        ) ,"{Maitrise:AutreInformations:@QD}"=>array(
             "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                   "max"=>3
                    ,'min'=>0
                    ,"placeholder"=>"00.00" 
                    ,"step"=>"0.01"
                    ,"title"=>"Nombre d'année d’expérience professionnelle en informatique "
                )
            )
            ,"name"=>"{Maitrise:AutreInformations:@QD}"
            ,"label"=>"Qualité du dossier du candidat: "

        )


    )
    ,"template"=>array(
        "ligne"=>array(
		
					"Formation"    		=> array("ordre"=>3,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@titre}","Value"=>"")
					,"TypeDiplome"  	=> array("ordre"=>4,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@Type}","Value"=>"")
					,"N1"       		=> array("ordre"=>5,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N1:@Score}","Value"=>"")
					,"N2"       		=> array("ordre"=>6,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N2:@Score}","Value"=>"")
					,"N3"       		=> array("ordre"=>7,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Ingenieur:SubComp:#N3:@Score}","Value"=>"")
					,"N4"       		=> array("ordre"=>8,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Maitrise:SubComp:#N4:@Score}","Value"=>"")
					,"Redouble" 		=> array("ordre"=>8,"Label"=>"Nombre de redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@nbrredouble}","Value"=>"")
					,"MR1"      		=> array("ordre"=>11,"Label"=>"<b style='color:green;'>MR1: Malus redoublement</b>","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@MR1}","Value"=>"")
					,"RAT"				=> array("ordre"=>9,"Label"=>"Nombre de Contrôle","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@RAT}","Value"=>"")
					,"MR2"      		=> array("ordre"=>11,"Label"=>"<b style='color:green;'>MR2: Malus rattrapage</b>","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@MR2}","Value"=>"")
					,"MR"       		=> array("ordre"=>12,"Label"=>"<b style='color:green;'>MR : Malus redoublement + Malus rattrapage</b>","Type"=>"EVAL","Malloc"=>"{Ingenieur:AutreInformations:@MR1}+{Ingenieur:AutreInformations:@MR2}","Value"=>"")
					,"Moy"      		=> array("ordre"=>10,"Label"=>"<b style='color:green;'>MG: Moyenne des années d’études après le BAC</b>","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Ingenieur:SubComp:Model:Moy:@Score})","Value"=>"")
					,"BMU"      		=> array("ordre"=>10,"Label"=>"<b style='color:red;'>BMU: Bonus selon les mentions en études universitaires sans PFE ou mémoire</b>","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BMU}","Value"=>"")
					,"BAC"      		=> array("ordre"=>1,"Label"=>"Moyenne de bac","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@bacmoyenne}","Value"=>"")
					,"BMB"  			=> array("ordre"=>2,"Label"=>"<b style='color:red;'>Bonus selon la mention du BAC</b>","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BMB}","Value"=>"")
					,"BEP"    			=> array("ordre"=>1,"Label"=>"<b style='color:red;'>Bonus selon l’expérience professionnelle en informatique</b>","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BEP}","Value"=>"")
					,"QD"    			=> array("ordre"=>1,"Label"=>"<b style='color:red;'>Qualité du dossier du candidat</b>","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@QD}","Value"=>"")
					,"Final"    		=> array("ordre"=>14,"Label"=>"<b style='color:green;'>Score</b>","Type"=>"SET","Malloc"=>"{Ingenieur:@Score}","Value"=>"")
		
         
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
$Label[4]="4éme année sans PFE";


for($i=1; $i<=4;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Maitrise['SubComp']['N$i']=$Niveau;");

}
