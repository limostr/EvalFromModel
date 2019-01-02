<?php 



//diplome Licence Appliquee
$Metrise =array(
    'Name'=>"Metrise"
    ,"parameters"=>array(
        "idcvp"=>"{Metrise:AutreInformations:@idcvparcoursetud}"
    )
    ,"database"=>array(
        "init"=>array(
            "idUser"=>7
        ),
        "loader"=>array(
            "table"=>"cvparcoursetud"
            ,"pkey"=>"idcvparcoursetud"
            ,"sql"=>array(
                    "s1"=>
                        array(
                                "sqlstring"=>"SELECT * FROM candidatcv WHERE idcandidat=:idUser"
                                 ,"prepare"=>array(
                                        "idUser"=>"{Metrise:database:init:#idUser}"
                                    )
                                 ,"bind"=>
                                     array(
                                         "SET"=>array(
                                             "idcandidatcv"=>"{Metrise:database:loader:sql:#s2:prepare:#idcandidatcv}"
                                         ),
                                         "GET"=>array(
                                             "{Metrise:AutreInformations:@bacmoyenne}"=>"moyenne"
                                             ,"{Metrise:AutreInformations:@idcandidatcv}"=>"idcandidatcv"

                                         )
                                     ),
                            'recordset'=>[]
                        )
                    ,"s2"=>
                        array(
                                "sqlstring"=>"SELECT * FROM cvparcoursetud WHERE idcandidatcv=:idcandidatcv"
                                ,"prepare"=>array(
                                    "idcandidatcv"=>""
                                    ,"idcvparcoursetud"=>""
                                )
                                ,"prepareInit"=>array(
                                    "idcvparcoursetud"=>"{Metrise:AutreInformations:@idcvparcoursetud}"
                                )
                                ,"bind"=>array(
                                            "GET"=>array(
                                                "{Metrise:AutreInformations:@titre}"=>"diplometitre"
                                                ,"{Metrise:AutreInformations:@id}"=>"idcvparcoursetud"
                                                ,"{Metrise:AutreInformations:@nbrredouble}"=>"nbrredouble"
                                                ,"{Metrise:AutreInformations:@BAD}"=>"anneeobtention"
                                                ,"{Metrise:AutreInformations:@idcvparcoursetud}"=>"idcvparcoursetud"
                                            ),
                                            "SET"=>array(
                                                "idcvparcoursetud"=>"{Metrise:database:loader:sql:#s3:prepare:#idcvparcoursetud};{Metrise:database:loader:sql:#s2:prepare:#idcvparcoursetud}"
                                             )
                                        ),
                                'SelectorType'=>array(
                                    'Multiple'=>1
                                    ,'chose'=>array(
                                        'typediplome'=>array(
                                            'IN'=>array(
                                                'Metrise'
                                            )
                                        )
                                    )
                                    ,"bind"=>array(
                                        "diplometitre"=>"{Label}"
                                        ,"idcvparcoursetud"=>"{idcvp}"
                                    ),
                                    "template"=>array(
                                        "message"=>"Choisir un dplôme"
                                        ,"template"=>"<br><b><a href='#' onclick=\"ReloadForData({idcvp:'{idcvp}',idmodel: 'Metrise'})\">{Label}</a></b>"
                                    )
                                ),
                                'recordset'=>[]
                             )
                    ,"s3"=>
                        array(
                                "sqlstring"=>"SELECT * FROM detailsparcoursetud WHERE idcvparcoursetud=:idcvparcoursetud"
                                ,"prepare"=>array(
                                    "idcvparcoursetud"=>""
                                )
                                ,"prepareInit"=>array(

                                )
                                ,"bind"=>array(
                                    "GET"=>array(
                                        "records"=>array(
                                            "{Metrise:SubComp:#N?:@Score}"=>"moyenne"
                                            ,"{Metrise:SubComp:#N?:AutreInformations:@session}"=>"session"
                                            ,"{Metrise:SubComp:#N?:AutreInformations:@id}"=>"iddetailsparcoursetud"
                                            ,"{Metrise:SubComp:#{N?}:AutreInformations:@BC}"=>"credit"
                                        )
                                    )
                                ),
                            'SelectorType'=>array(
                                    'Multiple'=>0
                                    ,'chose'=>array(
                                            'idniveauparcours'=>array(
                                                'IN'=>array(
                                                    'Niveau 1',
                                                    'Niveau 2',
                                                    'Niveau 3',
                                                    'Niveau 4'
                                                )
                                            )
                                        )
                                    ,"bind"=>array(

                                    ),
                                    "template"=>array(
                                        "message"=>" "
                                        ,"template"=>" "
                                    )
                                ),
                                    'recordset'=>[]
                                )
            ), 
        ),
        'insert'=>array(
            "s1"=>array(
                'bind'=>array(
                    "DATA"=>array(
                        "diplometitre"=>"{Metrise:AutreInformations:@titre}"
                        ,"idcandidatcv"=>"{Metrise:AutreInformations:@idcandidatcv}"
                        ,"nbrredouble"=>"{Metrise:AutreInformations:@nbrredouble}"
                        ,"anneeobtention" =>"{Metrise:AutreInformations:@BAD}"
                        ,"CPAYS" =>"{Metrise:AutreInformations:@CPAYS}"
                        ,"idlangues" =>"{Metrise:AutreInformations:@idlangues}"
                        ,"idtypesdiplome" =>"{Metrise:AutreInformations:@idtypesdiplome}"
                        ,"idbacplus"=>"{Metrise:AutreInformations:@idbacplus}"
                        ,"typediplome"=>"{Metrise:AutreInformations:@typediplome}"
                    )
                    ,"SET"=>array(
                        "idcvparcoursetud"=>"{Metrise:database:loader:sql:#s3:prepare:#idcvparcoursetud}"
                    ),"GET"=>array(
                        "{Metrise:AutreInformations:@idcvparcoursetud}"=>"idcvparcoursetud"
                    )
                )
                ,'table'=>'cvparcoursetud'
                ,'updateCondition'=>array(
                    "idcvparcoursetud"=>"{Metrise:AutreInformations:@id}"
                ) 
            )
        )
    )
    ,'Label'=>"Metrise"
    ,"Affiche"=>0
    ,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
            ,'nature'=>"arithmetique"
            ,'toEval'=>" 
                            MethodEval::MOYART({Metrise:SubComp:Model:Moy:@Score})*(1-({Metrise:AutreInformations:@MR1}+{Metrise:AutreInformations:@MR2})) 
							+ {Metrise:AutreInformations:@BMU} 
							+ {Metrise:AutreInformations:@BMB}
							+ {Metrise:AutreInformations:BEP}
							+ {Metrise:AutreInformations:@QD} 
						"
            ,"score"=>0
            ,"default"=>0
            ,"description"=>""
            ,"decision"=>""
            ,"bind"=>array("b1"=>"{Metrise:@Score}")
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
                                    ,"Type"=>"Metrise"
                                    ,"idcvp"=>""
                                    ,"MR1"=>"0"
                                    ,"MR2"=>"0"
                                    ,"MR"=>"0"
                                    ,"MG"=>"0"
                                    ,"RAT"=>"0"
                                    ,"BMU"=>"0"
                                    ,"QD"=>""

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
                            ,'toEval'=>"(MethodEval::SUM({Metrise:SubComp:Model:NBR_RAT:@Score}))"
                            ,"score"=>array("true"=>1,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>"Passable"
                            ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@RAT}")

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
                                ,'toEval'=>"MethodEval::MOYART({Metrise:SubComp:Model:Moy:@Score})"
                                ,"score"=>array("true"=>1,"false"=>0)
                                ,"default"=>0
                                ,"description"=>""
                                ,"decision"=>"Passable"
                                ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MG}")

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
                        ,'toEval'=>"{Metrise:AutreInformations:@bacmoyenne}>=10 && {Metrise:AutreInformations:@bacmoyenne} <12"
                        ,"score"=>array("true"=>0,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Passable"
                        ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@BMB}")
                    ),
                    "F2"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Metrise:AutreInformations:@bacmoyenne}>=12 && {Metrise:AutreInformations:@bacmoyenne} <14"
                        ,"score"=>array("true"=>0.5,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Assez bien"
                        ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@BMB}")
                    ),
                    "F3"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Metrise:AutreInformations:@bacmoyenne}>=14 && {Metrise:AutreInformations:@bacmoyenne} <16"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Bien"
                        ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@BMB}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Metrise:AutreInformations:@bacmoyenne}>=16"
                        ,"score"=>array("true"=>2,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Trés Bien"
                        ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@BMB}")
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
                            ,'toEval'=>"{Metrise:AutreInformations:@nbrredouble} == 1"
                            ,"score"=>array("true"=> 0.1 ,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MR1}")
                        ),"F2"=> array(
                            'type'=>'logique'
                            ,'nature'=>"else"
                            ,'toEval'=>"{Metrise:AutreInformations:@nbrredouble} == 2"
                            ,"score"=>array("true"=>0.2,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MR1}")
                        ),
                        "F4"=> array(
                            'type'=>'logique'
                            ,'nature'=>"else"
                            ,'toEval'=>"{Metrise:AutreInformations:@nbrredouble}>=3"
                            ,"score"=>array("true"=>0.3,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MR1}")
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
                            ,'toEval'=>"{Metrise:AutreInformations:@RAT}==0"
                            ,"score"=>array("true"=>0,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MR2}")
                            ),
                            "F2"=> array(
                                'type'=>'logique'
                            ,'nature'=>"else"
                            ,'toEval'=>"{Metrise:AutreInformations:@RAT}==1"
                            ,"score"=>array("true"=>0.05,"false"=>0)
                            ,"default"=>0
                            ,"description"=>""
                            ,"decision"=>""
                            ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MR2}")
                            ),"F2"=> array(
                                'type'=>'logique'
                                ,'nature'=>"else"
                                ,'toEval'=>"{Metrise:AutreInformations:@RAT}==2"
                                ,"score"=>array("true"=>0.1,"false"=>0)
                                ,"default"=>0
                                ,"description"=>""
                                ,"decision"=>""
                                ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MR2}")
                            ),
                            "F4"=> array(
                                'type'=>'logique'
                                ,'nature'=>"else"
                                ,'toEval'=>"{{Metrise:AutreInformations:@RAT}>=3"
                                ,"score"=>array("true"=>0.15,"false"=>0)
                                ,"default"=>0
                                ,"description"=>""
                                ,"decision"=>""
                                ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@MR2}")
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
                        ,'toEval'=>"MethodEval::SUM({Metrise:SubComp:Model:BM:@Score})"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{Metrise:AutreInformations:@BMU}")

                    )
                )
                ,'Score'=>""
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>"Malus rattrapage"

                )
            )
    ,'form'=>array(
        "{Metrise:AutreInformations:@titre}"=>array(
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
        ), "{Metrise:AutreInformations:@BAD}"=>array(
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

                ,"name"=>"{Metrise:AutreInformations:@BAD}"
                ,"label"=>"Année de diplôme : "

            ),
        "{Metrise:AutreInformations:@nbrredouble}"=>array(
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
            ),"{Metrise:AutreInformations:@id}"=>array(
                "type"=>"hidden"
                ,"options"=>array(
                        "other"=>array(
                            "value"=>""
                        )
                )
            ,"name"=>"{Metrise:AutreInformations:@id}"
            ,"label"=>"Id cv parcour"

        ),"{Metrise:AutreInformations:@bacmoyenne}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
            ,"name"=>"{Metrise:AutreInformations:@bacmoyenne}"
            ,"label"=>"bacmoyenne"

        ),"{Metrise:AutreInformations:@idcandidatcv}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Metrise:AutreInformations:@idcandidatcv}"
        ,"label"=>"idcandidatcv"

        ),"{Metrise:AutreInformations:@CPAYS}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>"TN"
                )
            )
            ,"name"=>"{Metrise:AutreInformations:@CPAYS}"
            ,"label"=>"CPAYS"

        ),"{Metrise:AutreInformations:@idlangues}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>"fr"
                    )
                )
            ,"name"=>"{Metrise:AutreInformations:@idlangues}"
            ,"label"=>"idlangues"

        ),"{Metrise:AutreInformations:@idtypesdiplome}"=>array(
            "type"=>"hidden"
        ,"options"=>array(
                "other"=>array(
                    "value"=>"Universitaire"
                )
            )
        ,"name"=>"{Metrise:AutreInformations:@idtypesdiplome}"
        ,"label"=>"idtypesdiplome"

        ),"{Metrise:AutreInformations:@idbacplus}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                "other"=>array(
                    "value"=>"4"
                )
            )
            ,"name"=>"{Metrise:AutreInformations:@idbacplus}"
            ,"label"=>"idbacplus"

        ),"{Metrise:AutreInformations:@idcvparcoursetud}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>""
                    )
                )
            ,"name"=>"Metrise:AutreInformations:@idcvparcoursetud}"
            ,"label"=>"idcvparcoursetud"

        ),"{Metrise:AutreInformations:@typediplome}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>"Metrise"
                    )
                )
            ,"name"=>"{Metrise:AutreInformations:@typediplome}"
            ,"label"=>"typediplome"

        ),
        "{Metrise:AutreInformations:@BEP}"=>array(
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
        ,"name"=>"{Metrise:AutreInformations:@BEP}"
        ,"label"=>"Nombre d'année d’expérience professionnelle en informatique: "
        ,"init"=> "MethodEval::ExPro({Metrise:database:init:#idUser})"
        ) ,"{Metrise:AutreInformations:@QD}"=>array(
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
            ,"name"=>"{Metrise:AutreInformations:@QD}"
            ,"label"=>"Qualité du dossier du candidat: "

        )


    )
    ,"template"=>array(
        "ligne"=>array(
            "Formation"    => array("ordre"=>0,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@titre}","Value"=>"")
            ,"TypeDiplome"    => array("ordre"=>1,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@Type}","Value"=>"")
            ,"QD"    => array("ordre"=>1,"Label"=>"Qualité du dossier du candidat ","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@QD}","Value"=>"")
            ,"BEP"    => array("ordre"=>1,"Label"=>"Bonus selon l’expérience professionnelle en informatique ","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@BEP}","Value"=>"")
            ,"Score"     => array("ordre"=>2,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Metrise:@Score}","Value"=>"")
            ,"BAC"      => array("ordre"=>3,"Label"=>"Moyenne de bac","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@bacmoyenne}","Value"=>"")
            ,"BMB"  	=> array("ordre"=>4,"Label"=>"Bonus selon la mention du BAC","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@BMB}","Value"=>"")
            ,"N1"       => array("ordre"=>5,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Metrise:SubComp:#N1:@Score}","Value"=>"")
            ,"N2"       => array("ordre"=>6,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Metrise:SubComp:#N2:@Score}","Value"=>"")
            ,"N3"       => array("ordre"=>7,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Metrise:SubComp:#N3:@Score}","Value"=>"")
            ,"N4"       => array("ordre"=>8,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Metrise:SubComp:#N4:@Score}","Value"=>"")
            ,"Moy"      => array("ordre"=>9,"Label"=>"MG: Moyenne des années d’études après le BAC","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Metrise:SubComp:Model:Moy:@Score})","Value"=>"")
            ,"Redouble" => array("ordre"=>8,"Label"=>"Redouble","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@nbrredouble}","Value"=>"")
            ,"BMU"      => array("ordre"=>10,"Label"=>"BMU: Moyenne des bonus selon la mention en études universitaires sans PFE ou mémoire","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@BMU}","Value"=>"")
            ,"MR1"      => array("ordre"=>11,"Label"=>"MR1: Malus redoublement","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@MR1}","Value"=>"")
            ,"MR2"      => array("ordre"=>11,"Label"=>"MR2: Malus rattrapage ","Type"=>"SET","Malloc"=>"{Metrise:AutreInformations:@MR2}","Value"=>"")
            ,"MR"       => array("ordre"=>12,"Label"=>"MR : Malus redoublement + Malus rattrapage","Type"=>"EVAL","Malloc"=>"{Metrise:AutreInformations:@MR1}+{Metrise:AutreInformations:@MR2}","Value"=>"")
            ,"Exp"      => array("ordre"=>13,"Label"=>"Expérience pro","Type"=>"EVAL","Malloc"=>"MethodEval::ExPro({Metrise:database:init:#idUser})","Value"=>"")
            ,"Final"    => array("ordre"=>14,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Metrise:@Score}","Value"=>"")
        )
        ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
            ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
);


$text = file_get_contents(dirname(__FILE__)."/comp_niveau.php");

$Label[1]="1ére année";
$Label[2]="2éme année";
$Label[3]="3éme année";
$Label[4]="4éme année";


for($i=1; $i<=4;$i++){

    $Niveau = str_ireplace(array("{N!?}","{Label[?!]}","{?!}"),array("N$i",$Label[$i],$i),$text);

    eval("\$Metrise['SubComp']['N$i']=$Niveau;");

}
