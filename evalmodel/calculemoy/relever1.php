<?php 



$Relever=array(
	'Name'=>'ReleverS1'
	,"parameters"=>array()//base de donnée initialisation de source de donnée avec id 
	,'Label'=>"Relevé des note de premier semestre"
	,"Affiche"=>0
	,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
            ,'nature'=>"arithmetique"
            ,'toEval'=>" 
				{ReleverS1:SubComp:#UE1:AutreInformations:@COEF}*{ReleverS1:SubComp:#UE1:AutreInformations:@Moyenne}
			 "
            ,"score"=>0
            ,"default"=>0
            ,"description"=>""
            ,"decision"=>""
            ,"bind"=>array("b1"=>"{ReleverS1:@Score}")
        )
    )
	,"From"=>"Model" //information qui permet de dire qu'on a un model d'evaluation
    ,'Score'=>""//score finalee 
    ,'Poid'=>""//Poid de score NON utilise
    ,'description'=>""//descreption
    ,'decision'=>"" // Non utiliser puisqu'on a changer le concept avec le model d'evaluation
    ,'SubComp'=>[] //les sous composante ne sont pas encore defini dans ce niveau
	,'AutreInformations'=>array( // tout les variable qui vont etre utiliser dans le systéme
		'Semestre'=>'S1'
		,'Credit'=>'60'
		,'Formation'=>'Licence appliquée'
		,'Moyenne'=>'00.00'
	)
	,'form'=>array(
        "{ReleverS1:AutreInformations:@Semestre}"=>array(
            "type"=>"select"
            ,"list"=>array(
                "S1" =>"Semestre 1"
                ,"S2"=>"Semestre 2"
            )

            ,"options"=>array(
                "class"=>array("required","Form-Control")
                ,"other"=>array()
            )
            ,"name"=>"{ReleverS1:AutreInformations:@Semestre}"
            ,"label"=>"Semestre: "
        ),
		"{ReleverS1:AutreInformations:@Formation}"=>array(
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
            ,"name"=>"{ReleverS1:AutreInformations:@Formation}"
            ,"label"=>"Titre: "
        )
	)
	
	,'Model'=>
			array(
                "credit"=>array(
                    'Name'=>"Credit"
					,'Label'=>"Credit "
					,'Formule'=>array(
							"F1"=> array(
								'type'=>'arithmetique'
								,'nature'=>"arithmetique"
								,'toEval'=>" {ReleverS1:SubComp:#UE1:AutreInformations:@Credit} "
								,"score"=>array("true"=>1,"false"=>0)
								,"default"=>0
								,"description"=>"Credit"
								,"decision"=>""
								,"bind"=>array("b1"=>"{ReleverS1:AutreInformations:@Credit}")
							)
						)
					,'Score'=>""
					,'Poid'=>""
					,'description'=>""
					,'decision'=>""
                )
			)
	
	 ,"template"=>array(
        "ligne"=>array(
            "UE1"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Unite}","Value"=>"")
			,"MoyenneUE1"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Moyenne}","Value"=>"")
			,"COEFUE1"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@COEF}","Value"=>"")
            ,"ECUE1"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Unite}","Value"=>"")
			,"CREDITUE1"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Credit}","Value"=>"")

            ,"COEFECUE1"    => array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@COEF}","Value"=>"")
			,"AAECUE1"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@AA}","Value"=>"")
			,"DS1ECUE1"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}","Value"=>"")
            ,"DS2ECUE1"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS2}","Value"=>"")
            ,"MoyenneECUE1" => array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Moyenne}","Value"=>"")
			,"CREDITECUE1"  => array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Credit}","Value"=>"")


			,"ECUE2"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Unite}","Value"=>"")
            ,"COEFECUE2"    => array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@COEF}","Value"=>"")
			,"AAECUE2"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@AA}","Value"=>"")
			,"DS1ECUE2"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}","Value"=>"")
            ,"DS2ECUE2"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS2}","Value"=>"")
            ,"MoyenneECUE2" => array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Moyenne}","Value"=>"")
            ,"CREDITECUE2"  => array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Credit}","Value"=>"")

        )
        ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"Mohamed")
            ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"Ali")
        )
    )
	
);




$UE1=array(
	'Name'=>'UE1'
	,"parameters"=>array()//base de donnée initialisation de source de donnée avec id 
	,'Label'=>"Programation WEB"
	,"Affiche"=>1
	,'Formule'=>array(
        "F1"=>array(
            'type'=>'arithmetique'
            ,'nature'=>"arithmetique"
            ,'toEval'=>" 
				{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@COEF}*{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Moyenne}+
				{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@COEF}*{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Moyenne}			
			 "
            ,"score"=>0
            ,"default"=>0
            ,"description"=>""
            ,"decision"=>""
            ,"bind"=>array("b1"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Moyenne}")
        )
		
    )
	,"From"=>"Model" //information qui permet de dire qu'on a un model d'evaluation
    ,'Score'=>""//score finalee 
    ,'Poid'=>""//Poid de score NON utilise
    ,'description'=>""//descreption
    ,'decision'=>"" // Non utiliser puisqu'on a changer le concept avec le model d'evaluation
    ,'SubComp'=>[] //les sous composante ne sont pas encore defini dans ce niveau
	,'AutreInformations'=>array( // tout les variable qui vont etre utiliser dans le systéme
	 
		 'Credit'=>'60'
		,'Unite'=>'Programation WEB'
		,'Moyenne'=>'00.00'
,'COEF'=>'0.4'		
	)
	,'form'=>array( )
	
	,'Model'=>
			array(
                "credit"=>array(
                    'Name'=>"credit"
					,'Label'=>"credit "
					,'Formule'=>array(
							"F1"=> array(
								'type'=>'arithmetique'
								,'nature'=>"arithmetique"
								,'toEval'=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Credit}+{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Credit}"
								,"score"=>array("true"=>1,"false"=>0)
								,"default"=>0
								,"description"=>"Bonus"
								,"decision"=>""
								,"bind"=>array("b1"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Credit}")
							)
						)
					,'Score'=>""
					,'Poid'=>""
					,'description'=>""
					,'decision'=>""
                )
			)
	
	 ,"template"=>array(
        "ligne"=>array(
			"UE1"    		=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:AutreInformations:@Unite}","Value"=>"")
            ,"ECUE1"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Unite}","Value"=>"")
            ,"AAECUE1"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Credit}","Value"=>"")
			,"DS1ECUE1"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}","Value"=>"")
            ,"DS2ECUE1"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS2}","Value"=>"")
            ,"MoyenneECUE1" => array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Moyenne}","Value"=>"")
			,"ECUE2"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Unite}","Value"=>"")
            ,"AAECUE2"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Credit}","Value"=>"")
			,"DS1ECUE2"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}","Value"=>"")
            ,"DS2ECUE2"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS2}","Value"=>"")
            ,"MoyenneECUE2"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Moyenne}","Value"=>"")

        )
        ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
            ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
	
);


$ECUE11=array(
	'Name'=>'ECUE11'
	,"parameters"=>array()//base de donnée initialisation de source de donnée avec id 
	,'Label'=>"Programation WEB PHP"
	,"Affiche"=>0
	,'Formule'=>array( )
	,"From"=>"Model" //information qui permet de dire qu'on a un model d'evaluation
    ,'Score'=>""//score finalee 
    ,'Poid'=>""//Poid de score NON utilise
    ,'description'=>""//descreption
    ,'decision'=>"" // Non utiliser puisqu'on a changer le concept avec le model d'evaluation
    ,'SubComp'=>[] //les sous composante ne sont pas encore defini dans ce niveau
	,'AutreInformations'=>array( // tout les variable qui vont etre utiliser dans le systéme
	 
		 'Credit'=>'60'
		,'Unite'=>'Programation WEB PHP'
		,'Moyenne'=>'00.00'
		,'AA'=>'00.00'
		,'DS1'=>'00.00'
		,'DS2'=>'00.00'
		,'COEF'=>'0.4'
	)
	,'form'=>array(
        
		"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>20
                    ,'min'=>0
                    ,"placeholder"=>"00.00"
                    ,"required"=>"required"
                    ,"step"=>"0.01"
                    ,"title"=>"Devoir serveiller 1 :"
                    ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}"
            ,"label"=>"DS1: "
        ),
		"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS2}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>20
                    ,'min'=>0
                    ,"placeholder"=>"00.00"
                    ,"required"=>"required"
                    ,"step"=>"0.01"
                    ,"title"=>"Devoir serveiller 2 :"
                    ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS2}"
            ,"label"=>"DS1: "
        ),
		"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@AA}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>20
                    ,'min'=>0
                    ,"placeholder"=>"00.00"
                    ,"required"=>"required"
                    ,"step"=>"0.01"
                    ,"title"=>"Devoir serveiller 1 :"
                    ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@AA}"
            ,"label"=>"Autre Activité : "
        )
	)
	
	,'Model'=>
			array(
                "Moyenne"=>array(
                    'Name'=>"Moyenne"
					,'Label'=>"Moyenne "
					,'Formule'=>array(
							"F1"=> array(
								'type'=>'arithmetique'
								,'nature'=>"arithmetique"
								,'toEval'=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}*0.4+{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}*0.4+{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@AA}*0.2"
								,"score"=>array("true"=>1,"false"=>0)
								,"default"=>0
								,"description"=>"Bonus"
								,"decision"=>""
								,"bind"=>array("b1"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Moyenne}")
							)
						)
					,'Score'=>""
					,'Poid'=>""
					,'description'=>""
					,'decision'=>""
                ),
				"Credit"=>array(
                    'Name'=>"Credit"
					,'Label'=>"Credit"
					,'Formule'=>array( 
							"F1"=> array(
								'type'=>'logique'
								,'nature'=>"if"
								,'toEval'=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Moyenne} >= 10"
								,"score"=>array("true"=> 5 ,"false"=>0)
								,"default"=>0
								,"description"=>""
								,"decision"=>""
								,"bind"=>array("b1"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Credit}")
							)
						)
					)
			)
	
	 ,"template"=>array(
        "ligne"=>array(
            "Unite"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Unite}","Value"=>"")
            ,"AA"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@AA}","Value"=>"")
			,"DS1"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS1}","Value"=>"")
            ,"DS2"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@DS2}","Value"=>"")
            ,"Moyenne"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE11:AutreInformations:@Moyenne}","Value"=>"")

        )
        ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
            ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
	
);


$ECUE12=array(
	'Name'=>'ECUE12'
	,"parameters"=>array()//base de donnée initialisation de source de donnée avec id 
	,'Label'=>"HTML & CSS & JS"
	,"Affiche"=>0
	,'Formule'=>array(  )
	,"From"=>"Model" //information qui permet de dire qu'on a un model d'evaluation
    ,'Score'=>""//score finalee 
    ,'Poid'=>""//Poid de score NON utilise
    ,'description'=>""//descreption
    ,'decision'=>"" // Non utiliser puisqu'on a changer le concept avec le model d'evaluation
    ,'SubComp'=>[] //les sous composante ne sont pas encore defini dans ce niveau
	,'AutreInformations'=>array( // tout les variable qui vont etre utiliser dans le systéme
	 
		 'Credit'=>'60'
		,'Unite'=>'HTML & CSS & JS'
		,'Moyenne'=>'00.00'
		,'AA'=>'00.00'
		,'DS1'=>'00.00'
		,'DS2'=>'00.00'
		,'COEF'=>'0.6'
	)
	,'form'=>array(
        
		"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>20
                    ,'min'=>0
                    ,"placeholder"=>"00.00"
                    ,"required"=>"required"
                    ,"step"=>"0.01"
                    ,"title"=>"Devoir serveiller 1 :"
                    ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}"
            ,"label"=>"DS1: "
        ),
		"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS2}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>20
                    ,'min'=>0
                    ,"placeholder"=>"00.00"
                    ,"required"=>"required"
                    ,"step"=>"0.01"
                    ,"title"=>"Devoir serveiller 2 :"
                    ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS2}"
            ,"label"=>"DS1: "
        ),
		"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@AA}"=>array(
            "type"=>"number"
            ,"options"=>array(
                "other"=>array(
                    "max"=>20
                    ,'min'=>0
                    ,"placeholder"=>"00.00"
                    ,"required"=>"required"
                    ,"step"=>"0.01"
                    ,"title"=>"Devoir serveiller 1 :"
                    ,"pattern"=>"^\d{1,2}(?:\.\d{1,2})?$"
                    ,"onblur"=>"this.parentNode.parentNode.style.backgroundColor=/^\d{1,2}(?:\.\d{1,2})?$/.test(this.value)?'inherit':'red'"
                )
            )
            ,"name"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@AA}"
            ,"label"=>"Autre Activité : "
        )
	)
	
	,'Model'=>
			array(
                "Moyenne"=>array(
                    'Name'=>"Moyenne"
					,'Label'=>"Moyenne "
					,'Formule'=>array(
							"F1"=> array(
								'type'=>'arithmetique'
								,'nature'=>"arithmetique"
								,'toEval'=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}*0.4+{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}*0.4+{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@AA}*0.2"
								,"score"=>array("true"=>1,"false"=>0)
								,"default"=>0
								,"description"=>"Moyenne"
								,"decision"=>""
								,"bind"=>array("b1"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Moyenne}")
							)
						)
					,'Score'=>""
					,'Poid'=>""
					,'description'=>""
					,'decision'=>""
                ),
				"Credit"=>array(
                    'Name'=>"Credit"
					,'Label'=>"Credit"
					,'Formule'=>array( 
							"F1"=> array(
								'type'=>'logique'
								,'nature'=>"if"
								,'toEval'=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Moyenne} >= 10"
								,"score"=>array("true"=> 6 ,"false"=>0)
								,"default"=>0
								,"description"=>""
								,"decision"=>""
								,"bind"=>array("b1"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Credit}")
							)
						)
					)
			)
	
	 ,"template"=>array(
        "ligne"=>array(
            "Unite"    	=> array("ordre"=>3,"Label"=>"Unité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Unite}","Value"=>"")
            ,"AA"  	=> array("ordre"=>4,"Label"=>"Autre activité","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@AA}","Value"=>"")
			,"DS1"  	=> array("ordre"=>4,"Label"=>"DS1","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS1}","Value"=>"")
            ,"DS2"  	=> array("ordre"=>4,"Label"=>"DS2","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@DS2}","Value"=>"")
            ,"Moyenne"  	=> array("ordre"=>4,"Label"=>"Moyenne","Type"=>"SET","Malloc"=>"{ReleverS1:SubComp:#UE1:SubComp:#ECUE12:AutreInformations:@Moyenne}","Value"=>"")

        )
        ,"liste"=>array(
            "Nom"       =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
            ,"Prenom"   =>      array("Type"=>"GET","Malloc"=>"","Value"=>"")
        )
    )
	
);

$Relever['SubComp']['UE1']=$UE1;
$Relever['SubComp']['UE1']['SubComp']['ECUE11']=$ECUE11;
$Relever['SubComp']['UE1']['SubComp']['ECUE12']=$ECUE12;
 
 