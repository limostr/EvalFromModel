<?php

$Bonus_CrediModel=
				array(
					'Name'=>"CompBac"
					,'Label'=>"1 année"
					,"Affiche"=>0
					,'Formule'=>array()
					,'Score'=>12.25
					,'Poid'=>""
					,'description'=>""
					,'decision'=>""
					,'SubComp'=>[]
					,'AutreInformations'=>array("session"=>"Rattrapage",'id'=>"")
					,'form'=>array()
					'Model'=>array(         
							"Credit"=>array(
								'Name'=>"Credit"
								,'Label'=>"Credit"
								,'Formule'=>array(
								   "F1"=> array(
										'type'=>'arithmetique'
										,'nature'=>"arithmetique"
										,'toEval'=>"MethodEval::SUM({Licence:SubComp:Model:BC:@Score}"
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
							),
							"BC"=>array(
								'Name'=>"BC"
								,'Label'=>"Evaluation de Bonus Credit"
								,'Formule'=>array(
									   "F1"=> array(
										   'type'=>'logique'
											,'nature'=>"if"
										   ,'toEval'=>"{Licence:AutreInformations:@credit}<151"
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
							), 
					)
				);