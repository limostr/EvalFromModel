<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 15/05/2018
 * Time: 00:44
 */

namespace evalLib\MetaRecords;


class RecordTemplate
{
    private $_ligne;
    private $_liste;


    public function setIn($key,$nature,$value){
        switch ($nature){
            case "ligne":
                $this->_ligne[$key]->setValue($value);
            break;
            case "liste":
                $this->_liste[$key]->setValue($value);
            break;
        }
    }

    public function init($Record_Template){

        if(isset($Record_Template['liste'])){
            foreach ($Record_Template['liste'] as $key => $elt){
                $Template = new \evalLib\MetaRecords\RecordTemplateElement();
                $Template->setType(isset($elt['Type']) ? $elt['Type'] : "");
                $Template->setMallocForm(isset($elt['Malloc']) ? $elt['Malloc'] : "");
                $Template->setValue(isset($elt['Value']) ? $elt['Value'] : "");
                $this->_liste[]=$Template;
            }

        }

        if(isset($Record_Template['ligne'])){
            foreach ($Record_Template['ligne'] as $key => $elt){
                $Template = new \evalLib\MetaRecords\RecordTemplateElement();
                $Template->setType(isset($elt['Type']) ? $elt['Type'] : "");
                $Template->setMallocForm(isset($elt['Malloc']) ? $elt['Malloc'] : "");
                $Template->setValue(isset($elt['Value']) ? $elt['Value'] : "");
                $this->_ligne[]=$Template;
            }

        }
    }


    /**
     * @return mixed
     */


    public function getLigne()
    {
        return $this->_ligne;
    }

    /**
     * @param mixed $ligne
     */
    public function setLigne($ligne)
    {
        $this->_ligne = $ligne;
    }

    /**
     * @return mixed
     */
    public function getListe()
    {
        return $this->_liste;
    }

    /**
     * @param mixed $liste
     */
    public function setListe($liste)
    {
        $this->_liste = $liste;
    }



}