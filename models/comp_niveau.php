${N!?}=array(
    'Name'=>"{N!?}"
    ,'Label'=>"{Label[?!]}"
    ,"database"=>array(
        'insert'=>array(
         "s2"=>array(
                'bind'=>array(
                    "DATA"=>array(
                        "records"=>array(
                            "moyenne"=>"{Licence:SubComp:#{N!?}:@Score}"
                            ,"session"=>"{Licence:SubComp:#{N!?}:AutreInformations:@session}"
                            ,"credit"=>"{Licence:SubComp:#{N!?}:AutreInformations:@BC}"
                            ,"idcvparcoursetud"=> "{Licence:AutreInformations:@idcvparcoursetud}"
                            ,"idtypepassage"=>"{Licence:SubComp:#{N!?}:AutreInformations:@idtypepassage}"
                            ,"idniveauparcours"=>"{Licence:SubComp:#{N!?}:AutreInformations:@idniveauparcours}"
                        )
                    )
                )
            ,'table'=>'detailsparcoursetud'
            ,'updateCondition'=>array(
                        "iddetailsparcoursetud"=>"{Licence:SubComp:#{N!?}:AutreInformations:@id}"

                )

            ),
        )

    )
    ,"Affiche"=>0
    ,'Formule'=>array()
    ,'Score'=>""
    ,'Poid'=>""
    ,'description'=>""
    ,'decision'=>""
    ,'SubComp'=>[]
    ,'AutreInformations'=>array("session"=>"",'id'=>"","BC"=>"","idtypepassage"=>"reuissi","idniveauparcours"=>"")
    ,'form'=>array(
        "{Licence:SubComp:#{N!?}:@Score}"=>array(
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
            ,"name"=>"{Licence:SubComp:#{N!?}:@Score}"
            ,"label"=>"Moyenne {Label[?!]}: "
        ),
		"{Licence:SubComp:#{N!?}:AutreInformations:@BC}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>60
                    ,'min'=>0
                    ,"placeholder"=>"00"
                   // ,"required"=>"required"
                    ,"step"=>"1"
                    ,"title"=>"Credit"
                    ,"pattern"=>"^\d{1,2}?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{Licence:SubComp:#{N!?}:AutreInformations:@BC}"
            ,"label"=>"Credit : "
        )
        ,"{Licence:SubComp:#{N!?}:AutreInformations:@session}"=>array(
            "type"=>"select"
            ,"list"=>array(
                "Principale" =>"Principale"
                ,"Rattrapage"=>"Rattrapage"
            )

            ,"options"=>array(
                "class"=>array("required","Form-Control")
                ,"other"=>array()
            )
            ,"name"=>"{Licence:SubComp:#{N!?}:AutreInformations:@session}"
            ,"label"=>"Session: "
        ),"{Licence:SubComp:#{N!?}:AutreInformations:@id}"=>array(
            "type"=>"hidden"
            ,"options"=>array(
                 "other"=>array(
                    "value"=>""
                )
            )
        ,"name"=>"{Licence:SubComp:#{N!?}:AutreInformations:@id}"
        ,"label"=>"Id Detail parcours"
        ),"{Licence:SubComp:#{N!?}:AutreInformations:@idtypepassage}"=>array(
                "type"=>"hidden"
                ,"options"=>array(
                "other"=>array(
                "value"=>"reuissi"
                )
            )
            ,"name"=>"{Licence:SubComp:#{N!?}:AutreInformations:@idtypepassage}"
            ,"label"=>"Type de passage"
        ),"{Licence:SubComp:#{N!?}:AutreInformations:@idniveauparcours}"=>array(
                "type"=>"hidden"
                ,"options"=>array(
                "other"=>array(
                "value"=>"Niveau {?!}"
            )
            )
            ,"name"=>"{Licence:SubComp:#{N!?}:AutreInformations:@idniveauparcours}"
            ,"label"=>"Niveau"
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
                    ,'toEval'=>" '{Licence:SubComp:#{N!?}:AutreInformations:@session}'=='Principale'  "
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>""
                    ,"bind"=>array("b1"=>"{Licence:SubComp:#{N!?}:Model:#BS:@Score}")

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
                       ,'toEval'=>"{Licence:SubComp:#{N!?}:@Score}>=10 && {Licence:SubComp:#{N!?}:@Score} <12"
                       ,"score"=>array("true"=>1,"false"=>0)
                       ,"default"=>0
                       ,"description"=>""
                       ,"decision"=>"Passable"
                       ,"bind"=>array("b1"=>"{Licence:SubComp:#{N!?}:Model:#BM:@Score}")
                   ),
                "F2"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:SubComp:#{N!?}:@Score}>=12 && {Licence:SubComp:#{N!?}:@Score} <14"
                    ,"score"=>array("true"=>2,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Assez bien"
                    ,"bind"=>array("b1"=>"{Licence:SubComp:#{N!?}:Model:#BM:@Score}")
                    ),
                "F3"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:SubComp:#{N!?}:@Score}>=14 && {Licence:SubComp:#{N!?}:@Score} <16"
                    ,"score"=>array("true"=>3,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Bien"
                    ,"bind"=>array("b1"=>"{Licence:SubComp:#{N!?}:Model:#BM:@Score}")
                ),
                "F4"=> array(
                    'type'=>'logique'
                    ,'nature'=>"else"
                    ,'toEval'=>"{Licence:SubComp:#{N!?}:@Score}>=16"
                    ,"score"=>array("true"=>4,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Trés Bien"
                    ,"bind"=>array("b1"=>"{Licence:SubComp:#{N!?}:Model:#BM:@Score}")
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
                    ,'toEval'=>"{Licence:SubComp:#{N!?}:@Score}"
                    ,"score"=>array("true"=>1,"false"=>0)
                    ,"default"=>0
                    ,"description"=>""
                    ,"decision"=>"Passable"
                    ,"bind"=>array("b1"=>"{Licence:SubComp:#{N!?}:Model:#Moy:@Score}")

                )
            )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
        ),
        "BC"=>array(
            'Name'=>"BC"
            ,'Label'=>"Bonnus credit"
            ,'Formule'=>array(
                "F1"=> array(
                'type'=>'arithmetique'
                ,'nature'=>"arithmetique"
                ,'toEval'=>"{Licence:SubComp:#{N!?}:AutreInformations:@BC}"
                ,"score"=>array("true"=>1,"false"=>0)
                ,"default"=>0
                ,"description"=>""
                ,"decision"=>"Passable"
                ,"bind"=>array("b1"=>"{Licence:SubComp:#{N!?}:Model:#BC:@Score}")

            )
            )
            ,'Score'=>""
            ,'Poid'=>""
            ,'description'=>""
            ,'decision'=>""
        )
    )
)