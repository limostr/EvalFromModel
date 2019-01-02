<?php



//diplome Licence Appliquee
$Technicien =array(
    'Name'=>"Technicien"
,"parameters"=>array(

    )
,'Label'=>"Technicien"
,"Affiche"=>0
,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
        ,'nature'=>"arithmetique"
        ,'toEval'=>" 
                            MethodEval::MOYART({Technicien:SubComp:Model:Moy:@Score})*(1-({Technicien:AutreInformations:@MR1}+{Technicien:AutreInformations:@MR2})) 
							+ {Technicien:AutreInformations:@BMU} 
							+ {Technicien:AutreInformations:@BMB}
							+ {Technicien:AutreInformations:BEP}
							+ {Technicien:AutreInformations:@QD} 
						"
        ,"score"=>0
        ,"default"=>0
        ,"description"=>""
        ,"decision"=>""
        ,"bind"=>array("b1"=>"{Technicien:@Score}")
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
    ,"Type"=>"Technicien"
    ,"idcvp"=>""
    ,"MR1"=>"0"
    ,"MR2"=>"0"
    ,"MR"=>"0"
    ,"MG"=>"0"
    ,"RAT"=>"0"
    ,"BMU"=>"0"
    ,"QD"=>""
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
                    ,'toEval'=>"{Technicien:AutreInformations:@EXP} == 1"
                    ,"score"=>array("true"=> 1 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BEP}")
                    ),"F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Technicien:AutreInformations:@EXP} == 2"
                    ,"score"=>array("true"=>2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BEP}")
                    ),
                    "F3"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Technicien:AutreInformations:@EXP}>=3"
                    ,"score"=>array("true"=>3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BEP}")
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
                    ,'toEval'=>"(MethodEval::SUM({Technicien:SubComp:Model:NBR_RAT:@Score}))"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Passable"
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@RAT}")

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
                ,'toEval'=>"MethodEval::MOYART({Technicien:SubComp:Model:Moy:@Score})"
                ,"score"=>array("true"=>1,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Passable"
                ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MG}")

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
                ,'toEval'=>"{Technicien:AutreInformations:@bacmoyenne}>=10 && {Technicien:AutreInformations:@bacmoyenne} <12"
                ,"score"=>array("true"=>0,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Passable"
                ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BMB}")
                ),
                "F2"=> array(
                    'type'=>'logique'
                ,'nature'=>"else"
                ,'toEval'=>"{Technicien:AutreInformations:@bacmoyenne}>=12 && {Technicien:AutreInformations:@bacmoyenne} <14"
                ,"score"=>array("true"=>0.5,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Assez bien"
                ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BMB}")
                ),
                "F3"=> array(
                    'type'=>'logique'
                ,'nature'=>"else"
                ,'toEval'=>"{Technicien:AutreInformations:@bacmoyenne}>=14 && {Technicien:AutreInformations:@bacmoyenne} <16"
                ,"score"=>array("true"=>1,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Bien"
                ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BMB}")
                ),
                "F4"=> array(
                    'type'=>'logique'
                ,'nature'=>"else"
                ,'toEval'=>"{Technicien:AutreInformations:@bacmoyenne}>=16"
                ,"score"=>array("true"=>2,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Trés Bien"
                ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BMB}")
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
                    ,'toEval'=>"{Technicien:AutreInformations:@nbrredouble} == 1"
                    ,"score"=>array("true"=> 0.1 ,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MR1}")
                    ),"F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Technicien:AutreInformations:@nbrredouble} == 2"
                    ,"score"=>array("true"=>0.2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MR1}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Technicien:AutreInformations:@nbrredouble}>=3"
                    ,"score"=>array("true"=>0.3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MR1}")
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
                    ,'toEval'=>"{Technicien:AutreInformations:@RAT}==0"
                    ,"score"=>array("true"=>0,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MR2}")
                    ),
                    "F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Technicien:AutreInformations:@RAT}==1"
                    ,"score"=>array("true"=>0.05,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MR2}")
                    ),"F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Technicien:AutreInformations:@RAT}==2"
                    ,"score"=>array("true"=>0.1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MR2}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{{Technicien:AutreInformations:@RAT}>=3"
                    ,"score"=>array("true"=>0.15,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@MR2}")
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
                    ,'toEval'=>"MethodEval::SUM({Technicien:SubComp:Model:BM:@Score})"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Technicien:AutreInformations:@BMU}")

                    )
                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>"Malus rattrapage"

            )
        )
,'form'=>array(
        "{Technicien:AutreInformations:@titre}"=>array(
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
        ), "{Technicien:AutreInformations:@BAD}"=>array(
            "type"=>"text"
        ,"options"=>array(
                "other"=>array(

                    "placeholder"=>"2018-2019"
                ,"required"=>"required"
                ,"title"=>"Format (Exp 2017-2018): "
                ,"pattern"=>"^\d{4}-\d{4}$"
                ,"onblur"=>"this.style.backgroundColor=/^\d{4}-\d{4}$/.test(this.value)?'inherit':'red'"
                )
            )

        ,"name"=>"{Technicien:AutreInformations:@BAD}"
        ,"label"=>"Année de diplôme : "

        ),
        "{Technicien:AutreInformations:@nbrredouble}"=>array(
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
        ),"{Technicien:AutreInformations:@id}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@id}"
        ,"label"=>"Id cv parcour"

        ),"{Technicien:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@bacmoyenne}"
        ,"label"=>"bacmoyenne"

        ),"{Technicien:AutreInformations:@idcandidatcv}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@idcandidatcv}"
        ,"label"=>"idcandidatcv"

        ),"{Technicien:AutreInformations:@CPAYS}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"TN"
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@CPAYS}"
        ,"label"=>"CPAYS"

        ),"{Technicien:AutreInformations:@idlangues}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"fr"
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@idlangues}"
        ,"label"=>"idlangues"

        ),"{Technicien:AutreInformations:@idtypesdiplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Universitaire"
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@idtypesdiplome}"
        ,"label"=>"idtypesdiplome"

        ),"{Technicien:AutreInformations:@idbacplus}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"4"
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@idbacplus}"
        ,"label"=>"idbacplus"

        ),"{Technicien:AutreInformations:@idcvparcoursetud}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"Technicien:AutreInformations:@idcvparcoursetud}"
        ,"label"=>"idcvparcoursetud"

        ),"{Technicien:AutreInformations:@typediplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Technicien"
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@typediplome}"
        ,"label"=>"typediplome"

        ),
        "{Technicien:AutreInformations:@EXP}"=>array(
            "type"=>"number"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                ,'min'=>0
                ,"placeholder"=>"0"
                ,"step"=>"0"
                ,"title"=>"Nombre d'année d’expérience professionnelle en informatique "
                )
            )
        ,"name"=>"{Technicien:AutreInformations:@EXP}"
        ,"label"=>"Nombre d'année d’expérience professionnelle en informatique: "
        ,"init"=> "MethodEval::ExPro({Technicien:database:init:#idUser})"
        ) ,"{Technicien:AutreInformations:@QD}"=>array(
            "type"=>"select"
        ,"list"=>array(
                "0" =>"0"
            ,"1"=>"1"
            ,"2"=>"2"
            ,"3"=>"3"
            )

        ,"options"=>array(
                "class"=>array("required","Form-Control")
            ,"other"=>array()
            )
        ,"name"=>"{Technicien:AutreInformations:@QD}"
        ,"label"=>"Qualité du dossier du candidat: "

        )


    )
,"template"=>array(
        "ligne"=>array(
            "Formation"    => array("ordre"=>0,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@titre}","Value"=>"")
        ,"TypeDiplome"    => array("ordre"=>1,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@Type}","Value"=>"")
        ,"QD"    => array("ordre"=>1,"Label"=>"Qualité du dossier du candidat ","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@QD}","Value"=>"")
        ,"BEP"    => array("ordre"=>1,"Label"=>"Bonus selon l’expérience professionnelle en informatique ","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@BEP}","Value"=>"")
        ,"Score"     => array("ordre"=>2,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Technicien:@Score}","Value"=>"")
        ,"BAC"      => array("ordre"=>3,"Label"=>"Moyenne de bac","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@bacmoyenne}","Value"=>"")
        ,"BMB"  	=> array("ordre"=>4,"Label"=>"Bonus selon la mention du BAC","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@BMB}","Value"=>"")
        ,"N1"       => array("ordre"=>5,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Technicien:SubComp:#N1:@Score}","Value"=>"")
        ,"N2"       => array("ordre"=>6,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Technicien:SubComp:#N2:@Score}","Value"=>"")
        ,"N3"       => array("ordre"=>7,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Technicien:SubComp:#N3:@Score}","Value"=>"")
        ,"N4"       => array("ordre"=>8,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Technicien:SubComp:#N4:@Score}","Value"=>"")
        ,"Moy"      => array("ordre"=>9,"Label"=>"MG: Moyenne des années d’études après le BAC","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Technicien:SubComp:Model:Moy:@Score})","Value"=>"")
        ,"Redouble" => array("ordre"=>8,"Label"=>"Redouble","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@nbrredouble}","Value"=>"")
        ,"BMU"      => array("ordre"=>10,"Label"=>"BMU: Moyenne des bonus selon la mention en études universitaires sans PFE ou mémoire","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@BMU}","Value"=>"")
        ,"MR1"      => array("ordre"=>11,"Label"=>"MR1: Malus redoublement","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@MR1}","Value"=>"")
        ,"MR2"      => array("ordre"=>11,"Label"=>"MR2: Malus rattrapage ","Type"=>"SET","Malloc"=>"{Technicien:AutreInformations:@MR2}","Value"=>"")
        ,"MR"       => array("ordre"=>12,"Label"=>"MR : Malus redoublement + Malus rattrapage","Type"=>"EVAL","Malloc"=>"{Technicien:AutreInformations:@MR1}+{Technicien:AutreInformations:@MR2}","Value"=>"")
        ,"Exp"      => array("ordre"=>13,"Label"=>"Expérience pro","Type"=>"EVAL","Malloc"=>"{Technicien:AutreInformations:@nbrredouble}","Value"=>"")
        ,"Final"    => array("ordre"=>14,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Technicien:@Score}","Value"=>"")
        )
    ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
);


$text = file_get_contents(dirname(__FILE__)."/../comp_niveau.php");

$Label[1]="Semestre 1";
$Label[2]="Semestre 2";
$Label[3]="Semestre 3";
$Label[4]="Semestre 4";
$Label[5]="S1 de la 3éme licence sans PFE";

for($i=1; $i<=4;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Technicien['SubComp']['N$i']=$Niveau;");

}
