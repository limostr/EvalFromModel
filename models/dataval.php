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
    ,"database"=>array(
        'SelectorType'=>array(
            'Multiple'=>0
            ,'SqlSequence'=>"s1"
            ,'chose'=>array(
                'typediplome'=>array('IN'=>array(
                    'Fondamentale',
                    'Appliqué',
                    'DUT'
                ))
            )
        )
        ,"init"=>array(
            "idUser"=>8
        ),
        "loader"=>array(
            "table"=>"cvparcoursetud"
            ,"pkey"=>"idcvparcoursetud"
            ,"sql"=>array(
                    "s1"=>
                        array(
                                "sql"=>"SELECT * FROM candidatcv WHERE idcandidat=:idUser"
                                 ,"prepare"=>array(
                                        "idUser"=>"{LA:database:init:#idUser}"
                                    )
                                 ,"bind"=>array(
                                    "{LA:database:loader:#s2:prepare:idcandidatcv}"
                                )
                        )
                    ,"s2"=>
                        array(
                                "sql"=>"SELECT * FROM cvparcoursetud WHERE idcandidatcv=:idcandidatcv"
                                ,"prepare"=>array(
                                    "idcandidatcv"=>""
                                )
                                ,"bind"=>array(
                                         "{LA:form:#LA_Titre:options:other:@value}"=>"diplometitre"
                                        ,"{LA:form:#LA_Titre:options:other:@data_Id}"=>"idcvparcoursetud"
                                    )
                             )
            ),


        ),
        'insert'=>array(
            'bind'=>array(
                ''=>''
            )
            ,'table'=>''
            ,'updateCondetion'=>''

        )
    )
    ,'Label'=>"Parcours Licence Appliquée"
    ,"Affiche"=>1
    ,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
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
    ,'AutreInformations'=>""
    ,'Model'=>array()
    ,'form'=>array(
        "LA_Titre"=>array(
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
    ,'AutreInformations'=>array("session"=>"Rattrapage")
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
        )

    )
    ,'Model'=>array(
        "BS"=>array(
            'Name'=>"BS"
            ,'Label'=>"Bonus Session"
            ,'Formule'=>array(
                "F1"=>array(
                    'type'=>'logique'
                    ,'toEval'=>"
                        '{LA:SubComp:#N1:AutreInformations:@session}'=='Principale'  
                    "
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
                       ,'toEval'=>"{LA:SubComp:#N1:@Score}>=10 && {LA:SubComp:#N1:@Score} <12"
                       ,"score"=>array("true"=>1,"false"=>0)
                       ,"default"=>0
                       ,"description"=>""
                       ,"decision"=>"Passable"
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
            ,'Label'=>"Bonus Session"
            ,'Formule'=>array(
                "F1"=> array(
                    'type'=>'arithmetique'
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
            )

        )

    ,'Model'=>array(
            "BS"=>array(
                'Name'=>"BS"
                ,'Label'=>"Bonus Session"
                ,'Formule'=>array(
                       "F1"=> array(
                           'type'=>'logique'
                           ,'toEval'=>"'{LA:SubComp:#N2:AutreInformations:@session}'=='Principale'"
                           ,"score"=>array("true"=>1,"false"=>0)
                           ,"default"=>0,"description"=>""
                           ,"decision"=>""
                           ,"bind"=>array("b1"=>"{LA:SubComp:#N2:Model:#BS:@Score}")
                       )

                    )
                ,'Score'=>"2"
                ,'Poid'=>""
                ,'description'=>""
                ,'decision'=>""
            ),
            "BM"=>array(
                'Name'=>"BM"
                ,'Label'=>"Bonus Session"
                ,'Formule'=>array(
                    "F1"=> array('type'=>'logique',
                        'toEval'=>"{LA:SubComp:#N2:@Score}>=10 && {LA:SubComp:#N2:@Score} <12"
                        ,"score"=>array("true"=>1,"false"=>0)
                        ,"default"=>0
                        ,"description"=>""
                        ,"decision"=>"Passable"
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
                ,'Label'=>"Bonus Session"
                ,'Formule'=>array(
                    "F1"=> array(
                        'type'=>'arithmetique'
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
