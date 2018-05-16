<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 14/05/2018
 * Time: 13:05
 */

/**
 * 'Multiple'=>0
,'SqlSequence'=>"s1"
,'chose'=>array(
'typediplome'=>array('IN'=>array(
'Fondamentale',
'Appliqué',
'DUT'
))
)
 */
namespace evalLib\MetaRecords\RecordDB;
use evalLib\MetaRecords\Record;

class RecordSelector implements Record
{
    private $_Multiple;
    private $_SqlSequence;
    private $_Chose;

    public function Init($Record){
        $this->_Multiple=$Record["Multiple"];
        $this->_SqlSequence=$Record["SqlSequence"];
        $this->_Chose=$Record["chose"];
    }

    /**
     * @return mixed
     */
    public function getMultiple()
    {
        return $this->_Multiple;
    }

    /**
     * @param mixed $Multiple
     */
    public function setMultiple($Multiple)
    {
        $this->_Multiple = $Multiple;
    }

    /**
     * @return mixed
     */
    public function getSqlSequence()
    {
        return $this->_SqlSequence;
    }

    /**
     * @param mixed $SqlSequence
     */
    public function setSqlSequence($SqlSequence)
    {
        $this->_SqlSequence = $SqlSequence;
    }

    /**
     * @return mixed
     */
    public function getChose()
    {
        return $this->_Chose;
    }

    /**
     * @param mixed $chose
     */
    public function setChose($Chose)
    {
        $this->_Chose = $Chose;
    }
    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}
    public function HasAttribute($attribute){}
}