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

    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}
    public function HasAttribute($attribute){}
}