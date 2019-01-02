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
                            MethodEval::MOYART({Licence:SubComp:Model:Moy:@Score})*(1-({Licence:AutreInformations:@MR1}+{Licence:AutreInformations:@MR2})) 
							+ {Licence:AutreInformations:@BMU} 
							+ {Licence:AutreInformations:@BMB}
							+ {Licence:AutreInformations:BEP}
							+ {Licence:AutreInformations:@QD} 
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
    ,"BC"=>"0"
    ,"credit"=>"0"
    ,"BD"=>"0"
    ,"BAD"=>"0"
    ,"bacmoyenne"=>"0"
    ,"BMB"=>"0"
    ,"Type"=>"Licence"
    ,"idcvp"=>""
    ,"MR1"=>"0"
    ,"MR2"=>"0"
    ,"MR"=>"0"
    ,"MG"=>"0"
    ,"RAT"=>"0"
    ,"BMU"=>"0"
    ,"QD"=>"0"
    ,"BEP"=>"0"
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
                    ,'toEval'=>"{Licence:AutreInformations:@EXP} == 1"
                    ,"score"=>array("true"=> 1 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BEP}")
                    ),"F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@EXP} == 2"
                    ,"score"=>array("true"=>2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BEP}")
                    ),
                    "F3"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@EXP}>=3"
                    ,"score"=>array("true"=>3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BEP}")
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
        ), "BMB"=>array(
            'Name'=>"BMB"
        ,'Label'=>"Bonus selon la mention du BAC"
        ,'Formule'=>array(
                "F1"=> array(
                    'type'=>'logique'
                ,'nature'=>"if"
                ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=10 && {Licence:AutreInformations:@bacmoyenne} <12"
                ,"score"=>array("true"=>0,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Passable"
                ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BMB}")
                ),
                "F2"=> array(
                    'type'=>'logique'
                ,'nature'=>"else"
                ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=12 && {Licence:AutreInformations:@bacmoyenne} <14"
                ,"score"=>array("true"=>0.5,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Assez bien"
                ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BMB}")
                ),
                "F3"=> array(
                    'type'=>'logique'
                ,'nature'=>"else"
                ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=14 && {Licence:AutreInformations:@bacmoyenne} <16"
                ,"score"=>array("true"=>1,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Bien"
                ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BMB}")
                ),
                "F4"=> array(
                    'type'=>'logique'
                ,'nature'=>"else"
                ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=16"
                ,"score"=>array("true"=>2,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Trés Bien"
                ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BMB}")
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
                    ,'toEval'=>"{Licence:AutreInformations:@nbrredouble} == 1"
                    ,"score"=>array("true"=> 0.1 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@MR1}")
                    ),"F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@nbrredouble} == 2"
                    ,"score"=>array("true"=>0.2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@MR1}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@nbrredouble}>=3"
                    ,"score"=>array("true"=>0.3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@MR1}")
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
                    ,'toEval'=>"{Licence:AutreInformations:@RAT}==0"
                    ,"score"=>array("true"=>0,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@MR2}")
                    ),
                    "F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@RAT}==1"
                    ,"score"=>array("true"=>0.05,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@MR2}")
                    ),"F3"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@RAT}==2"
                    ,"score"=>array("true"=>0.1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@MR2}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:AutreInformations:@RAT}>=3"
                    ,"score"=>array("true"=>0.15,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@MR2}")
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
                    ,'toEval'=>"MethodEval::SUM({Licence:SubComp:Model:BM:@Score})"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BMU}")

                    )
                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>"Malus rattrapage"

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
                    ,"title"=>"Format (Exp 2017-2018): "
                   // ,"pattern"=>"^\d{4}$"
                   // ,"onblur"=>"this.style.backgroundColor=/^\d{4}$/.test(this.value)?'inherit':'red'"
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

        ),"{Licence:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Licence:AutreInformations:@bacmoyenne}"
        ,"label"=>"bacmoyenne"

        ),"{Licence:AutreInformations:@idcandidatcv}"=>array(
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

        ),
        "{Licence:AutreInformations:@EXP}"=>array(
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
        ,"name"=>"{Licence:AutreInformations:@EXP}"
        ,"label"=>"Nombre d'année d’expérience professionnelle en informatique: "
        //,"init"=> "MethodEval::ExPro({Licence:database:init:#idUser})"
        ) ,"{Licence:AutreInformations:@QD}"=>array(
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
        ,"name"=>"{Licence:AutreInformations:@QD}"
        ,"label"=>"Qualité du dossier du candidat: "

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
				,"MR1"      		=> array("ordre"=>11,"Label"=>"MR1: Malus redoublement","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@MR1}","Value"=>"")
				,"RAT"				=> array("ordre"=>9,"Label"=>"Nombre de Contrôle","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@RAT}","Value"=>"")
				,"MR2"      		=> array("ordre"=>11,"Label"=>"MR2: Malus rattrapage ","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@MR2}","Value"=>"")
				,"MR"       		=> array("ordre"=>12,"Label"=>"MR : Malus redoublement + Malus rattrapage","Type"=>"EVAL","Malloc"=>"{Ingenieur:AutreInformations:@MR1}+{Ingenieur:AutreInformations:@MR2}","Value"=>"")
				,"Moy"      		=> array("ordre"=>10,"Label"=>"MG: Moyenne des années d’études après le BAC","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Ingenieur:SubComp:Model:Moy:@Score})","Value"=>"")
				,"BMU"      		=> array("ordre"=>10,"Label"=>"BMU: Bonus selon les mentions en études universitaires sans PFE ou mémoire","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BMU}","Value"=>"")
				,"BAC"      		=> array("ordre"=>1,"Label"=>"Moyenne de bac","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@bacmoyenne}","Value"=>"")
				,"BMB"  			=> array("ordre"=>2,"Label"=>"Bonus selon la mention du BAC","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BMB}","Value"=>"")
				,"BEP"    			=> array("ordre"=>1,"Label"=>"Bonus selon l’expérience professionnelle en informatique ","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@BEP}","Value"=>"")
				,"QD"    			=> array("ordre"=>1,"Label"=>"Qualité du dossier du candidat ","Type"=>"SET","Malloc"=>"{Ingenieur:AutreInformations:@QD}","Value"=>"")
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

    eval("\$Licence['SubComp']['N$i']=$Niveau;");

}
