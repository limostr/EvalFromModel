<?php 

$CompBac =array(
    'Name'=>"CompBac"
    ,'Label'=>"Bac"
    ,"database"=>array(
        'insert'=>array(
         "s2"=>array(
                'bind'=>array(
                    "DATA"=>array(
                        "records"=>array(
                            "moyenne"=>"{DIP:SubComp:#CompBac:@Score}"
                            ,"session"=>"{DIP:SubComp:#CompBac:AutreInformations:@session}"
                        )
                    )
                )
            ,'table'=>'detailsparcoursetud'
            ,'updateCondition'=>array(
                        "iddetailsparcoursetud"=>"{DIP:SubComp:#CompBac:AutreInformations:@id}"

                )
            ),
        )
    )
    ,"Affiche"=>0
    ,'Formule'=>array()
    ,'Score'=>12.25
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>array("session"=>"Rattrapage",'id'=>"")
    ,'form'=>array(
        "{DIP:SubComp:#CompBac:@Score}"=>array(
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
            ,"name"=>"{DIP:SubComp:#CompBac:@Score}"
            ,"label"=>"Moyenne 1ére année: "
        )
        ,"{DIP:SubComp:#CompBac:AutreInformations:@session}"=>array(
            "type"=>"select"
            ,"list"=>array(
                "Principale" =>"Principale"
                ,"Rattrapage"=>"Rattrapage"
            )

            ,"options"=>array(
                "class"=>array("required","Form-Control")
                ,"other"=>array()
            )
            ,"name"=>"{DIP:SubComp:#CompBac:AutreInformations:@session}"
            ,"label"=>"Session: "
        ),"{DIP:SubComp:#CompBac:AutreInformations:@id}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                 "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{DIP:SubComp:#CompBac:AutreInformations:@id}"
        ,"label"=>"Id Detail parcours"
        )

    )
    ,'Model'=>array(
         
        "BM"=>array(
            'Name'=>"BM"
            ,'Label'=>"Bonus Moyenne"
            ,'Formule'=>array(
                   "F1"=> array(
                       'type'=>'logique'
                        ,'nature'=>"if"
                       ,'toEval'=>"{DIP:SubComp:#CompBac:@Score}>=10 && {DIP:SubComp:#CompBac:@Score} <12"
                       ,"score"=>array("true"=>0,"false"=>0)
                       ,"default"=>0
                       ,"description"=>""
                       ,"decision"=>"Passable"
                       ,"bind"=>array("b1"=>"{DIP:SubComp:#CompBac:Model:#BM:@Score}")
                   ),
                "F2"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{DIP:SubComp:#CompBac:@Score}>=12 && {DIP:SubComp:#CompBac:@Score} <14"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Assez bien"
                    ,"bind"=>array("b1"=>"{DIP:SubComp:#CompBac:Model:#BM:@Score}")
                    ),
                "F3"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{DIP:SubComp:#CompBac:@Score}>=14 && {DIP:SubComp:#CompBac:@Score} <16"
                    ,"score"=>array("true"=>2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Bien"
                    ,"bind"=>array("b1"=>"{DIP:SubComp:#CompBac:Model:#BM:@Score}")
                ),
                "F4"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{DIP:SubComp:#CompBac:@Score}>=16"
                    ,"score"=>array("true"=>3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Trés Bien"
                    ,"bind"=>array("b1"=>"{DIP:SubComp:#CompBac:Model:#BM:@Score}")
                )

                )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
        ) 
    )
);
