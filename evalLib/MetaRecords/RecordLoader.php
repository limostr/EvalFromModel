<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 13:08
 *
 *
 *
 */

namespace evalLib\MetaRecords;

class RecordLoader implements Record
{
    private $_Requests;
    private $_Table;
    private $_PKey;
    private $_ValuesLoaded;
    public function init($Record_Load){

        $this->_Table=isset($Record_Load['table']) ? $Record_Load['table'] : "";
        $this->_PKey=isset($Record_Load['pkey']) ? $Record_Load['pkey'] : "";

        if(isset($Record_Load['sql'])){
            foreach ($Record_Load['sql'] as $key => $sql){
                $LoderRecord = new \evalLib\MetaRecords\RecordSql();
                $LoderRecord->setSql(isset($sql['sql']) ? $sql['sql'] : "");
                $LoderRecord->setPrepare(isset($sql['prepare']) ? $sql['prepare'] : "");
                $LoderRecord->setBind(isset($sql['bind']) ? $sql['bind'] : "");
                $this->_Requests[$key]=$LoderRecord;
            }

        }
    }

    /**
     * @return mixed
     */
    public function getRequests()
    {
        return $this->_Requests;
    }

    /**
     * @param mixed $Requests
     */
    public function setRequests($Requests)
    {
        $this->_Requests = $Requests;
    }

    /**
     * @return mixed
     */
    public function getTable()
    {
        return $this->_Table;
    }

    /**
     * @param mixed $Table
     */
    public function setTable($Table)
    {
        $this->_Table = $Table;
    }

    /**
     * @return mixed
     */
    public function getPKey()
    {
        return $this->_PKey;
    }

    /**
     * @param mixed $PKey
     */
    public function setPKey($PKey)
    {
        $this->_PKey = $PKey;
    }

    /**
     * @return mixed
     */
    public function getValuesLoaded()
    {
        return $this->_ValuesLoaded;
    }

    /**
     * @param mixed $ValuesLoaded
     */
    public function setValuesLoaded($ValuesLoaded)
    {
        $this->_ValuesLoaded = $ValuesLoaded;
    }

    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}
    public function HasAttribute($attribute){}
}