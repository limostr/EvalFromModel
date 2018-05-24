<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 08/05/2018
 * Time: 13:24
 */


$modelData =array(
    'Name'
    ,'Label'
    ,'Formule'
    ,'Score'
    ,'Poid'
    ,'description'
    ,'decision'
    ,'AutreInformations'
    ,'Model'
    ,'SubComp'
);

$EvalModelData=array(
    'Name'=>"ParcourUniversitaire"
    ,'Label'=>"Parcours Universitaire"
    ,'Formule'=>array()
    ,'Score'=>""
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>""
    ,'Model'=>array()
);

//diplome Licence Appliquee
$LA =array(
     'Name'=>"LA"
    ,"parameters"=>array(
        "id"=>"{LA:database:loader:sql:#s2:prepareInit:#idcvparcoursetud}"
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
                                        "idUser"=>"{LA:database:init:#idUser}"
                                    )
                                 ,"bind"=>
                                     array(
                                         "SET"=>array(
                                             "idcandidatcv"=>"{LA:database:loader:sql:#s2:prepare:#idcandidatcv}"
                                         )
                                     ),
                            'recordset'=>[]
                        )
                    ,"s2"=>
                        array(
                                "sqlstring"=>"SELECT * FROM cvparcoursetud WHERE idcandidatcv=:idcandidatcv"
                                ,"prepare"=>array(
                                    "idcandidatcv"=>""
                                )
                                ,"prepareInit"=>array(

                                )
                                ,"bind"=>array(
                                            "GET"=>array(
                                                "{LA:AutreInformations:@titre}"=>"diplometitre"
                                                ,"{LA:AutreInformations:@id}"=>"idcvparcoursetud"
                                                ,"{LA:AutreInformations:@nbrredouble}"=>"idcvparcoursetud"
                                            ),
                                            "SET"=>array(
                                                "idcvparcoursetud"=>"{LA:database:loader:sql:#s3:prepare:#idcvparcoursetud}"
                                            )
                                        ),
                                'SelectorType'=>array(
                                'Multiple'=>1
                                ,'chose'=>array(
                                    'typediplome'=>array(
                                        'IN'=>array(
                                            'Fondamentale',
                                            'Appliqué',
                                            'DUT'
                                        )
                                    )
                                )
                                ,"bind"=>array(
                                    "diplometitre"=>"{Label}"
                                    ,"idcvparcoursetud"=>"{id}"
                                ),
                                "template"=>array(
                                    "message"=>"Choisir un dplôme"
                                    ,"template"=>"<br><b><a href='index.php?id={id}'>{Label}</a></b>"
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
                                            "{LA:SubComp:#N?:@Score}"=>"moyenne"
                                            ,"{LA:SubComp:#N?:AutreInformations:@session}"=>"session"
                                            ,"{LA:SubComp:#N?:AutreInformations:@id}"=>"iddetailsparcoursetud"
                                        )
                                    )
                                ),
                            'SelectorType'=>array(
                                    'Multiple'=>0
                                    ,'chose'=>array(
                                            'idniveauparcours'=>array(
                                                'IN'=>array(
                                                    'Niveau 1',
                                                    'Niveau 2'
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
                    "GET"=>array(

                    )
                    ,"SET"=>array(

                    )
                )
                ,'table'=>''
                ,'updateCondition'=>''
            ),

        )
    )
    ,'Label'=>"Parcours Licence Appliquée"
    ,"Affiche"=>1
    ,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
            ,'nature'=>"arithmetique"
            ,'toEval'=>"MethodEval::SUM({LA:SubComp:Model:BS:@Score}) * MethodEval::MOYART({LA:SubComp:Model:Moy:@Score})+MethodEval::SUM({LA:SubComp:Model:BM:@Score})"
            ,"score"=>0
            ,"default"=>0
            ,"description"=>""
            ,"decision"=>""
            ,"bind"=>array("b1"=>"{LA:@Score}")
        )
    )
    ,"From"=>"Model"
    ,'Score'=>""
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>array("titre"=>"","nbrredouble"=>"","id"=>"")
    ,'Model'=>array()
    ,'form'=>array(
        "{LA:AutreInformations:@titre}"=>array(
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
        "{LA:AutreInformations:@nbrredouble}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "value"=>""
                    ,'min'=>0
                    ,"placeholder"=>"0"
                    ,"required"=>"required"
                    ,"step"=>"0"
                    ,"title"=>"Nombre d'année de redoublemment"

                )
            )
                ,"name"=>"Nbr_Redouble"
                ,"label"=>"Moyenne 1ére année: "
            ),"{LA:AutreInformations:@id}"=>array(
                "type"=>"hidden"
                ,"options"=>array(
                        "other"=>array(
                                "value"=>""
                        )
                )
            ,"name"=>"Id cv parcour"
            ,"label"=>"Id cv parcour"
        )
    )
    ,"template"=>array(
        "ligne"=>array(
            "Score" =>      array("Type"=>"SET","Malloc"=>"{LA:@Score}","Value"=>"")
            ,"N1"   =>      array("Type"=>"SET","Malloc"=>"{LA:SubComp:#N1:@Score}","Value"=>"")
            ,"N2"   =>      array("Type"=>"SET","Malloc"=>"{LA:SubComp:#N2:@Score}","Value"=>"")
            ,"BS"   =>      array("Type"=>"EVAL","Malloc"=>"MethodEval::SUM({LA:SubComp:Model:BS:@Score})","Value"=>"")
            ,"BM"   =>      array("Type"=>"EVAL","Malloc"=>"MethodEval::SUM({LA:SubComp:Model:BM:@Score})","Value"=>"")
            ,"Moy"  =>      array("Type"=>"EVAL","Malloc"=>"MethodEval::MOYART({LA:SubComp:Model:Moy:@Score})","Value"=>"")
        )
        ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
            ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
);
///Niveau1 Licence Appliquer
$N1 =array(
    'Name'=>"N1"
    ,'Label'=>"1 année"
    ,"Affiche"=>0
    ,'Formule'=>array()
    ,'Score'=>12.25
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>array("session"=>"Rattrapage",'id'=>"")
    ,'form'=>array(
        "{LA:SubComp:#N1:@Score}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>20
                    ,'min'=>0
                    ,"placeholder"=>"00.00"
                    ,"required"=>"required"
                    ,"step"=>"0.01"
                    ,"title"=>"Moyenne de l'année"
                    ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{LA:SubComp:#N1:@Score}"
            ,"label"=>"Moyenne 1ére année: "
        )
        ,"{LA:SubComp:#N1:AutreInformations:@session}"=>array(
            "type"=>"select"
            ,"list"=>array(
                "Principale" =>"Principale"
                ,"Rattrapage"=>"Rattrapage"
            )

            ,"options"=>array(
                "class"=>array("required","Form-Control")
                ,"other"=>array()
            )
            ,"name"=>"{LA:SubComp:#N1:AutreInformations:@session}"
            ,"label"=>"Session: "
        ),"{LA:SubComp:#N1:AutreInformations:@id}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                 "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{LA:SubComp:#N1:AutreInformations:@id}"
        ,"label"=>"Id Detail parcours"
        )

    )
    ,'Model'=>array(
        "BS"=>array(
            'Name'=>"BS"
            ,'Label'=>"Bonus Session"
            ,'Formule'=>array(
                "F1"=>array(
                    'type'=>'logique'
                    ,'nature'=>"if"
                    ,'toEval'=>" '{LA:SubComp:#N1:AutreInformations:@session}'=='Principale'  "
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N1:Model:#BS:@Score}")

                )

            )
            ,'Score'=>"1"
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
        ),
        "BM"=>array(
            'Name'=>"BM"
            ,'Label'=>"Bonus Moyenne"
            ,'Formule'=>array(
                   "F1"=> array(
                       'type'=>'logique'
                        ,'nature'=>"if"
                       ,'toEval'=>"{LA:SubComp:#N1:@Score}>=10 && {LA:SubComp:#N1:@Score} <12"
                       ,"score"=>array("true"=>1,"false"=>0)
                       ,"default"=>0
                       ,"description"=>""
                       ,"decision"=>"Passable"
                       ,"bind"=>array("b1"=>"{LA:SubComp:#N1:Model:#BM:@Score}")
                   ),
                "F2"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{LA:SubComp:#N1:@Score}>=12 && {LA:SubComp:#N1:@Score} <14"
                    ,"score"=>array("true"=>2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Assez bien"
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N1:Model:#BM:@Score}")
                    ),
                "F3"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{LA:SubComp:#N1:@Score}>=14 && {LA:SubComp:#N1:@Score} <16"
                    ,"score"=>array("true"=>3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Bien"
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N1:Model:#BM:@Score}")
                ),
                "F4"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{LA:SubComp:#N1:@Score}>=16"
                    ,"score"=>array("true"=>4,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Trés Bien"
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N1:Model:#BM:@Score}")
                )

                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
        ),
        "Moy"=>array(
            'Name'=>"Moy"
            ,'Label'=>"Moyenne"
            ,'Formule'=>array(
                "F1"=> array(
                    'type'=>'arithmetique'
                    ,'nature'=>"arithmetique"
                    ,'toEval'=>"{LA:SubComp:#N1:@Score}"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Passable"
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N1:Model:#Moy:@Score}")

                )
            )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
        )
    )
);

///Niveau1 Licence Appliquer
$N2 =array(
     'Name'=>"N2"
    ,'Label'=>"2 année"
    ,"Affiche"=>0
    ,'Formule'=>array()
    ,'Score'=>17.25
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>array("session"=>"Principale")
    ,'form'=>
        array(
            "{LA:SubComp:#N2:@Score}"=> array(
                "type"=>"number"
                ,"options"=>array(
                        "other"=>array("max"=>20
                                        ,'min'=>0
                                        ,"placeholder"=>"00.00"
                                        ,"required"=>"required"
                                        ,"step"=>"0.01"
                                        ,"title"=>"Moyenne de l'année"
                                        ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                                        ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                        )
                    )
                ,"name"=>"{LA:SubComp:#N2:@Score}"
                ,"label"=>"Moyenne 2éme année: "
            )
            ,"{LA:SubComp:#N2:AutreInformations:@session}"=>array(
                "type"=>"select"
                ,"list"=>array(
                    "Principale" =>"Principale"
                    ,"Rattrapage"=>"Rattrapage"
                )
                ,"options"=>array(  )
                ,"name"=>"{LA:SubComp:#N2:AutreInformations:@session}"
                ,"label"=>"Session: "
            ),"{LA:SubComp:#N2:AutreInformations:@id}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                    "other"=>array(
                        "value"=>""
                    )
                )
        ,"name"=>"{LA:SubComp:#N2:AutreInformations:@id}"
        ,"label"=>"Id Detail parcours"
        )

        )

    ,'Model'=>array(
            "BS"=>array(
                'Name'=>"BS"
                ,'Label'=>"Bonus Session"
                ,'Formule'=>array(
                       "F1"=> array(
                           'type'=>'logique'
                           ,'nature'=>"if"
                           ,'toEval'=>"'{LA:SubComp:#N2:AutreInformations:@session}'=='Principale'"
                           ,"score"=>array("true"=>1,"false"=>0)
                           ,"default"=>0,"description"=>""
                           ,"decision"=>""
                           ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#BS:@Score}")

                       ),
                    "F2"=>array(
                        'type'=>'logique'
                        ,'nature'=>"else"
                        ,'toEval'=>"'{LA:SubComp:#N2:AutreInformations:@session}'=='Principale'"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0,"description"=>""
                        ,"decision"=>""
                        ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#BS:@Score}")
                    ),

                    )
                ,'Score'=>"2"
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>""
            ),
            "BM"=>array(
                'Name'=>"BM"
                ,'Label'=>"Bonus Mention"
                ,'Formule'=>array(
                    "F1"=> array(
                        'type'=>'logique'
                        ,'nature'=>"if"
                        ,'toEval'=>"{LA:SubComp:#N2:@Score}>=10 && {LA:SubComp:#N2:@Score} <12"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Passable"
                        ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#BM:@Score}")
                        ),
                    "F2"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{LA:SubComp:#N2:@Score}>=12 && {LA:SubComp:#N2:@Score} <14"
                    ,"score"=>array("true"=>2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Assez bien"
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#BM:@Score}")
                    ),
                    "F3"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{LA:SubComp:#N2:@Score}>=14 && {LA:SubComp:#N2:@Score} <16"
                    ,"score"=>array("true"=>3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Bien"
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#BM:@Score}")
                    ),
                    "F4"=> array(
                        'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{LA:SubComp:#N2:@Score}>=16"
                    ,"score"=>array("true"=>4,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Trés Bien"
                    ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#BM:@Score}")
                    )
                    )
                ,'Score'=>"0"
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>""
            ),
            "Moy"=>array(
                'Name'=>"Moy"
                ,'Label'=>"Moyenne"
                ,'Formule'=>array(
                    "F1"=> array(
                        'type'=>'arithmetique'
                        ,'nature'=>"arithmetique"
                        ,'toEval'=>"{LA:SubComp:#N2:@Score}"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Passable"
                        ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#Moy:@Score}")

                    )
                )
                ,'Score'=>"15"
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>""
            )
        )
);

$LA['SubComp']["N1"]=$N1;
$LA['SubComp']["N2"]=$N2;
$LAModel =$LA;
