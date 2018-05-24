<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 13/05/2018
 * Time: 18:41
 */

namespace evalLib\MetaRecords\RecordDB;
use evalLib\MetaRecords\Record;

class RecordSql implements Record
{
    private $_Sql;
    private $_Bind;
    private $_Prepare;
    public  $_SelectorType;
    private $_RecordSet;
    private $_PrepareInit=array();

    /**
     * @return mixed
     */
    public function getSql()
    {
        return $this->_Sql;
    }

    /**
     * @param mixed $Sql
     */
    public function setSql($Sql)
    {
        $this->_Sql = $Sql;
    }

    /**
     * @return mixed
     */
    public function getBind()
    {
        return $this->_Bind;
    }

    /**
     * @param mixed $Bind
     */
    public function setBind($Bind)
    {
        $this->_Bind = $Bind;
    }

    /**
     * @return mixed
     */
    public function getPrepare()
    {
        return $this->_Prepare;
    }

    /**
     * @param mixed $Prepare
     */
    public function setPrepare($Prepare)
    {
        $this->_Prepare = $Prepare;
    }

    public function setInPrepare($KeyName,$value)
    {
        if(isset($this->_Prepare[$KeyName])){
            $this->_Prepare[$KeyName] = $value;
        }else{
            throw new \Exception("Erreur");
        }
    }

    public function getInPrepare($KeyName)
    {

            return $this->_Prepare[$KeyName] ;

    }

    /**
     * @return mixed
     */
    public function getSelectorType()
    {
        return $this->_SelectorType;
    }

    /**
     * @param mixed $SelectorType
     */
    public function setSelectorType($SelectorType)
    {
        $this->_SelectorType = $SelectorType;
    }

    /**
     * @return mixed
     */
    public function getRecordSet()
    {
        return $this->_RecordSet;
    }

    /**
     * @param mixed $RecordSet
     */
    public function setRecordSet($RecordSet)
    {
        $this->_RecordSet = $RecordSet;
    }

    /**
     * @return mixed
     */
    public function getPrepareInit()
    {
        return $this->_PrepareInit;
    }

    /**
     * @param mixed $prepareInit
     */
    public function setPrepareInit($prepareInit)
    {
        $this->_PrepareInit = $prepareInit;
    }

    public function AddPrepareInit($attrib,$value){
        $this->_PrepareInit["$attrib"]=$value;
    }

    public function  UnsetPrepareInit($attrib){
        unset($this->_PrepareInit["$attrib"]);
    }


    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}
    public function HasAttribute($attribute){}
}