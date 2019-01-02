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
                                    "idcvparcoursetud"=>"{Licence:AutreInformations:@idcvparcoursetud}"
                                )
                                ,"bind"=>array(
                                            "GET"=>array(
                                                "{Licence:AutreInformations:@titre}"=>"diplometitre"
                                                ,"{Licence:AutreInformations:@id}"=>"idcvparcoursetud"
                                                ,"{Licence:AutreInformations:@nbrredouble}"=>"nbrredouble"
                                                ,"{Licence:AutreInformations:@BAD}"=>"anneeobtention"
                                                ,"{Licence:AutreInformations:@idcvparcoursetud}"=>"idcvparcoursetud"
                                            ),
                                            "SET"=>array(
                                                "idcvparcoursetud"=>"{Licence:database:loader:sql:#s3:prepare:#idcvparcoursetud};{Licence:database:loader:sql:#s2:prepare:#idcvparcoursetud}"
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
                                            "{Licence:SubComp:#N?:@Score}"=>"moyenne"
                                            ,"{Licence:SubComp:#N?:AutreInformations:@session}"=>"session"
                                            ,"{Licence:SubComp:#N?:AutreInformations:@id}"=>"iddetailsparcoursetud"
                                            ,"{Licence:SubComp:#{N?}:AutreInformations:@BC}"=>"credit"
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
                        "diplometitre"=>"{Licence:AutreInformations:@titre}"
                        ,"idcandidatcv"=>"{Licence:AutreInformations:@idcandidatcv}"
                        ,"nbrredouble"=>"{Licence:AutreInformations:@nbrredouble}"
                        ,"anneeobtention" =>"{Licence:AutreInformations:@BAD}"
                        ,"CPAYS" =>"{Licence:AutreInformations:@CPAYS}"
                        ,"idlangues" =>"{Licence:AutreInformations:@idlangues}"
                        ,"idtypesdiplome" =>"{Licence:AutreInformations:@idtypesdiplome}"
                        ,"idbacplus"=>"{Licence:AutreInformations:@idbacplus}"
                        ,"typediplome"=>"{Licence:AutreInformations:@typediplome}"
                    )
                    ,"SET"=>array(
                        "idcvparcoursetud"=>"{Licence:database:loader:sql:#s3:prepare:#idcvparcoursetud}"
                    ),"GET"=>array(
                        "{Licence:AutreInformations:@idcvparcoursetud}"=>"idcvparcoursetud"
                    )
                )
                ,'table'=>'cvparcoursetud'
                ,'updateCondition'=>array(
                    "idcvparcoursetud"=>"{Licence:AutreInformations:@id}"
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
            ,'toEval'=>" ( MethodEval::SUM({Licence:SubComp:Model:BS:@Score}) * 0.5)+
							MethodEval::MOYART({Licence:SubComp:Model:Moy:@Score}) -
							(0.5 * MethodEval::SUM({Licence:SubComp:Model:BM:@Score})  ) 
							- {Licence:AutreInformations:@nbrredouble}
							 
							
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
                                    ,"BBAC"=>""
                                    ,"Type"=>"Metrise"
                                    ,"idcvp"=>""
                            )
    ,'Model'=>
			array(
			/*"BC"=>array(
						'Name'=>"BC"
						,'Label'=>"Bonus Credit"
						,'Formule'=>array(
							   "F1"=> array(
									'type'=>'arithmetique'
									,'nature'=>"arithmetique"
									,'toEval'=>"MethodEval::SUM({Licence:SubComp:AutreInformations:@BC}"
									,"score"=>0
									,"default"=>0
									,"description"=>""
									,"decision"=>""
									,"bind"=>array("b1"=>"{Licence:@Score}")
									
							   ) 
							)
							,'Score'=>""
							,'Poid'=>""
							,'description'=>""
							,'decision'=>""
				),*/
				"BD"=>array(
						'Name'=>"BD"
						,'Label'=>"Bonus Diplome"
						,'Formule'=>array(
							"F1"=> array(
								   'type'=>'logique'
									,'nature'=>"if"
								   ,'toEval'=>"'{DIP:AutreInformations:@Type}'=='licence'"
								   ,"score"=>array("true"=>2,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"Licence"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BD}")
						   ),"F2"=> array(
								   'type'=>'logique'
									,'nature'=>"else"
								   ,'toEval'=>"'{DIP:AutreInformations:@Type}'=='maitrise'"
								   ,"score"=>array("true"=>3,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"maitrise"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BD}")
						   ),"F3"=> array(
								   'type'=>'logique'
									,'nature'=>"else"
								   ,'toEval'=>"'{DIP:AutreInformations:@Type}'=='ingénieur'"
								   ,"score"=>array("true"=>3,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"ingénieur"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BD}")
						   ),"F3"=> array(
								   'type'=>'logique'
									,'nature'=>"else"
								   ,'toEval'=>"'{DIP:AutreInformations:@Type}'=='doctorat'"
								   ,"score"=>array("true"=>4,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"doctorat"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BD}")
						   )
						)
						,'Score'=>""
						,'Poid'=>""
						,'description'=>""
						,'decision'=>""
				
				),
				"BAD"=>array(
						'Name'=>"BAD"
						,'Label'=>"Bonus d'année d'optention de l'diplome"
						,'Formule'=>array(
							"F1"=> array(
								   'type'=>'logique'
									,'nature'=>"if"
								   ,'toEval'=>"'{Licence:AutreInformations:@BAD}'=='2017-2018'"
								   ,"score"=>array("true"=>3,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"Licence"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BAD}")
						   ),"F2"=> array(
								   'type'=>'logique'
									,'nature'=>"else"
								   ,'toEval'=>"'{Licence:AutreInformations:@BAD}'=='2016-2017'"
								   ,"score"=>array("true"=>2,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"Licence"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BAD}")
						   ),"F3"=> array(
								   'type'=>'logique'
									,'nature'=>"else"
								   ,'toEval'=>"'{Licence:AutreInformations:@BAD}'=='2015-2016'"
								   ,"score"=>array("true"=>1,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"Licence"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BAD}")
						   ),"F3"=> array(
								   'type'=>'logique'
									,'nature'=>"else"
								   ,'toEval'=>"'{Licence:AutreInformations:@BAD}'<'2016'"
								   ,"score"=>array("true"=>0,"false"=>0)
								   ,"default"=>0
								   ,"description"=>""
								   ,"decision"=>"Licence"
								   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BAD}")
						   )
						)
						,'Score'=>""
						,'Poid'=>""
						,'description'=>""
						,'decision'=>""						
				)
			 	,"Credit"=>array(
					'Name'=>"credit"
					,'Label'=>"Credit"
					,'Formule'=>array(
					"F1"=> array(
						'type'=>'arithmetique'
						,'nature'=>"arithmetique"
						,'toEval'=>"MethodEval::SUM({Licence:SubComp:Model:BC:@Score})"
						,"score"=>0
						,"default"=>0
						,"description"=>""
						,"decision"=>""
						,"bind"=>array("b1"=>"{Licence:AutreInformations:@credit}")
						
				   ) 
				)
				,'Score'=>""
				,'Poid'=>""
				,'description'=>""
				,'decision'=>""
			)
			,"BC"=>array(
				'Name'=>"BC"
				,'Label'=>"Evaluation de Bonus Credit"
				,'Formule'=>array(
					   "F1"=> array(
						   'type'=>'logique'
							,'nature'=>"if"
						   ,'toEval'=>"{Licence:AutreInformations:@credit} < 151"
						   ,"score"=>array("true"=>0,"false"=>0)
						   ,"default"=>0
						   ,"description"=>""
						   ,"decision"=>""
						   ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BC}")
					   ),
						"F2"=> array(
							 'type'=>'logique'
							,'nature'=>"else"
							,'toEval'=>"{Licence:AutreInformations:@credit}>=151 && {Licence:AutreInformations:@credit}<=170"
							,"score"=>array("true"=>2,"false"=>0)
							,"default"=>0
							,"description"=>""
							,"decision"=>""
							,"bind"=>array("b1"=>"{Licence:AutreInformations:@BC}")
						),
						"F3"=> array(
							 'type'=>'logique'
							,'nature'=>"else"
							,'toEval'=>"{Licence:AutreInformations:@credit}>=171"
							,"score"=>array("true"=>4,"false"=>0)
							,"default"=>0
							,"description"=>""
							,"decision"=>""
							,"bind"=>array("b1"=>"{Licence:AutreInformations:@BC}")
						),
					)
				,'Score'=>""
				,'Poid'=>""
				,'description'=>""
				,'decision'=>""
			), "BBAC"=>array(
                'Name'=>"BM"
                ,'Label'=>"Bonus Moyenne"
                ,'Formule'=>array(
                    "F1"=> array(
                        'type'=>'logique'
                        ,'nature'=>"if"
                        ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=10 && {Licence:AutreInformations:@bacmoyenne} <12"
                        ,"score"=>array("true"=>0,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Passable"
                        ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BBAC}")
                    ),
                    "F2"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=12 && {Licence:AutreInformations:@bacmoyenne} <14"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Assez bien"
                        ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BBAC}")
                    ),
                    "F3"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=14 && {Licence:AutreInformations:@bacmoyenne} <16"
                        ,"score"=>array("true"=>2,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Bien"
                        ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BBAC}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"{Licence:AutreInformations:@bacmoyenne}>=16"
                        ,"score"=>array("true"=>3,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Trés Bien"
                        ,"bind"=>array("b1"=>"{Licence:AutreInformations:@BBAC}")
                    )

                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""

                ),
	
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
                "type"=>"select"
                ,"list"=>array(
                    "2017-2018" =>"2018"
                    ,"2016-2017"=>"2017"
					,"2015-2016"=>"2016"
					,"2014-2015"=>"2015"
                )
                ,"options"=>array(  )
                ,"name"=>"{Licence:AutreInformations:@BAD}"
                ,"label"=>"Année de diplôme: "
            ),
        "{Licence:AutreInformations:@nbrredouble}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                    ,'min'=>0
                    ,"placeholder"=>"0"
                   // ,"required"=>"required"
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
                        "value"=>"Metrise"
                    )
                )
            ,"name"=>"{Licence:AutreInformations:@typediplome}"
            ,"label"=>"typediplome"

        ),


    )
    ,"template"=>array(
        "ligne"=>array(
            "Score"     => array("ordre"=>0,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Licence:@Score}","Value"=>"")
        ,"BAC"      => array("ordre"=>1,"Label"=>"Moyenne de bac","Type"=>"SET","Malloc"=>"{Licence:AutreInformations:@bacmoyenne}","Value"=>"")
        ,"BBAC" 	=> array("ordre"=>2,"Label"=>"Bonus Bac","Type"=>"SET","Malloc"=>"{Licence:AutreInformations:@BBAC}","Value"=>"")
        ,"N1"       => array("ordre"=>3,"Label"=>"Moyenne 1","Type"=>"SET","Malloc"=>"{Licence:SubComp:#N1:@Score}","Value"=>"")
        ,"N2"       => array("ordre"=>4,"Label"=>"Moyenne 2","Type"=>"SET","Malloc"=>"{Licence:SubComp:#N2:@Score}","Value"=>"")
        ,"N3"       => array("ordre"=>5,"Label"=>"Moyenne 3","Type"=>"SET","Malloc"=>"{Licence:SubComp:#N3:@Score}","Value"=>"")
        ,"N4"       => array("ordre"=>5,"Label"=>"Moyenne 4","Type"=>"SET","Malloc"=>"{Licence:SubComp:#N4:@Score}","Value"=>"")
        ,"Moy"      => array("ordre"=>6,"Label"=>"Moyenne générale","Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({Licence:SubComp:Model:Moy:@Score})","Value"=>"")
        ,"BM"       => array("ordre"=>7,"Label"=>"Bonus mention","Type"=>"EVAL","Malloc"=>"MethodEval::SUM({Licence:SubComp:Model:BM:@Score})","Value"=>"")
        ,"Credit"   => array("ordre"=>8,"Label"=>"Credit","Type"=>"SET","Malloc"=>"{Licence:AutreInformations:@credit}","Value"=>"")
        ,"BC"   	=> array("ordre"=>9,"Label"=>"Bonus credit","Type"=>"SET","Malloc"=>"{Licence:AutreInformations:@BC}","Value"=>"")
        ,"BS"       => array("ordre"=>10,"Label"=>"Bonus session","Type"=>"EVAL","Malloc"=>"MethodEval::SUM({Licence:SubComp:Model:BS:@Score})","Value"=>"")
        ,"ScoreBS"  => array("ordre"=>11,"Label"=>"Score de bonus session","Type"=>"EVAL","Malloc"=>"0.5 * MethodEval::SUM({Licence:SubComp:Model:BS:@Score})","Value"=>"")
        ,"Exp"      => array("ordre"=>12,"Label"=>"Expérience pro","Type"=>"EVAL","Malloc"=>"MethodEval::ExPro({Licence:database:init:#idUser})","Value"=>"")
        ,"Final"    => array("ordre"=>13,"Label"=>"Score","Type"=>"SET","Malloc"=>"{Licence:@Score}","Value"=>"")
        ,"Formation"    => array("ordre"=>13,"Label"=>"Formation","Type"=>"SET","Malloc"=>"{Licence:AutreInformations:@titre}","Value"=>"")
        ,"TypeDiplome"    => array("ordre"=>14,"Label"=>"Type Diplôme","Type"=>"SET","Malloc"=>"{Licence:AutreInformations:@Type}","Value"=>"")
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
