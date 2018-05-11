<?php

namespace evalLib;


/**
 * Class CompEvaluation
 * Composante d'èvaluation
 */

class CompEvaluation_test
{

    public $_RecordEval;
    public $_RecordForm;
    public $_RecordLoader;


    public $_Name;
    public $_Label;
    public $_Formule;
    public $_Score;
    public $_Poid;
    public $_description;
    public $_decission;
    public $_form;
    public $_AutreInformations;//JsonStructur -->Object Notation : StdClass
    public $_Model ;//CompModel
    public $_Affiche;
    public $_SubComp=array();

    public function __construct()
    {
         $this->_RecordEval=new \evalLib\MetaRecords\RecordModelEval();
        $this->_RecordForm=new \evalLib\MetaRecords\RecordForm();
        $this->_RecordLoader=new \evalLib\MetaRecords\RecordLoader();


        $parameters = func_get_args();
        $number_of_arguments = func_num_args();
         if($number_of_arguments==1){
            if(!empty($parameters[0]) ){
                $this->DecodeAndInstance($parameters[0]);
            }
        }else{
            throw  new \Exception("Erreur de construction d'objet à partir de ");
        }

    }



    public function getSubComp(string $varname) :CompEvaluation
    {
        return $this->_SubComp[$varname];
    }

    /**
     * @param array $SubComp
     */
    public function setSubComp(CompEvaluation $SubComp)
    {
        $this->_SubComp[$SubComp->_Name] = $SubComp;
    }

    public function toJson():string {

    }

    private function DecodeAndInstance($StrComp){

        if($StrComp instanceof string){
            $JsonDecode = json_decode($StrComp);
        }else{
            $JsonDecode=$StrComp;
        }

        $this->InitComp($JsonDecode);
         if(isset($JsonDecode['SubComp'])){
            foreach ($JsonDecode['SubComp'] as $JDecoded){
                $this->setSubComp(new CompEvaluation($JDecoded));
            }
        }
    }

    private function InitComp($JsonDecode = array()){

        $this->_Name=isset($JsonDecode['Name']) ? $JsonDecode['Name'] : "";
        $this->_Label=isset($JsonDecode['Label']) ? $JsonDecode['Label'] : "";
        $this->_Formule=isset($JsonDecode['Formule']) ? $JsonDecode['Formule'] : "";
        $this->_Score=isset($JsonDecode['Score']) ? $JsonDecode['Score'] : "";
        $this->_Poid=isset($JsonDecode['Poid']) ? $JsonDecode['Poid'] : "";
        $this->_description=isset($JsonDecode['description']) ? $JsonDecode['description'] : "";
        $this->_decission=isset($JsonDecode['decission']) ? $JsonDecode['decission'] : "";
        $this->_AutreInformations=isset($JsonDecode['AutreInformations']) ? $JsonDecode['AutreInformations'] : "";
        $this->_Model=isset($JsonDecode['Model']) ? $JsonDecode['Model'] : "";
        $this->_form=isset($JsonDecode['form']) ? $JsonDecode['form'] : "";
        $this->_Affiche=isset($JsonDecode['Affiche']) ? $JsonDecode['Affiche'] : "";


    }

    /**
     * Recursive function
     */
    public function evaluation(){
        if(count($this->_SubComp)>0){
            foreach ($this->_SubComp as $SubEval){
                $SubEval->evaluation();
            }
        }else{

        }
    }




}