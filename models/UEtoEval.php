<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 00:34
 */

$EvalModelData=array(
    'Name'=>"ParcourUniversitaire"
    ,'Label'=>"Parcours Universitaire"
    ,'Formule'=>""
    ,'Score'=>""
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>""
    ,'Model'=>array()
);

//diplome Licence Appliquer
$ue =array(
    'Name'=>"ListeUE"
    ,'Label'=>"Liste des Module d'equivalence"
    ,"Affiche"=>1
    ,'Formule'=>""
    ,"From"=>"Model"
    ,'Score'=>""
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>""
    ,'Model'=>array()

);

$M1 =array(
    'Name'=>"DB"
    ,'Label'=>"Base de donnée"
    ,'Formule'=>array()
    ,"From"=>"Model"
    ,"Affiche"=>0
    ,'Score'=>""
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>""
    ,'Model'=>array()
    ,'form'=>array(
            array(
                "type"=>"text"
                ,"options"=>array(
                    "class"=>array(
                        "[required]"
                    )
                )
                ,"name"=>"DB_Titre"
                ,"label"=>"Titre: "
            ),
            array(
                "type"=>"number"
                ,"options"=>array(
                        "other"=>array(
                            "max"=>20
                        ,"min"=>0
                    ),
                "class"=>array(
                    "[required]"
                )
                )
                ,"name"=>"DB_Moyenne"
                ,"label"=>"Moyenne: "
            )
        )
);

$M2 =array(
    'Name'=>"MATH"
,'Label'=>"Mathematique"
,'Formule'=>array()
,"From"=>"Model"
,"Affiche"=>0
,'Score'=>""
,'Poid'=>""
,'description'=>""
,'decision'=>""
,'SubComp'=>[]
,'AutreInformations'=>""
,'Model'=>array()
,'form'=>array(
        array(
            "type"=>"text"
        ,"options"=>array(
            "class"=>array(
                "[required]"
            )
        )
        ,"name"=>"MATH_Titre"
        ,"label"=>"Titre: "
        ),
        array(
            "type"=>"number"
        ,"options"=>array(
            "other"=>array(
                "max"=>20
            ,"min"=>0
            ),
            "class"=>array(
                "[required]"
            )
        )
        ,"name"=>"MATH_Moyenne"
        ,"label"=>"Moyenne: "
        )
    )
);
$ue['SubComp']["BD"]=$M1;
$ue['SubComp']["MATH"]=$M2;