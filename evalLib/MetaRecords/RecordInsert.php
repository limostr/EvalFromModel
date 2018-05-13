<?php
/**
 * Created by PhpStorm.
 * User: username
 * Date: 13/05/2018
 * Time: 19:59
 */

namespace evalLib\MetaRecords;

use evalLib\MetaRecords\Record;

class RecordInsert implements Record
{

    private $_Bind;
    private $_Table;
    private $_UpdateCondetion;


    public function init($RecordInsert){
        $this->_Bind=$RecordInsert['bind'];
        $this->_Table=$RecordInsert['table'];
        $this->_UpdateCondetion=$RecordInsert['updateCondetion'];
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
    public function getUpdateCondetion()
    {
        return $this->_UpdateCondetion;
    }

    /**
     * @param mixed $UpdateCondetion
     */
    public function setUpdateCondetion($UpdateCondetion)
    {
        $this->_UpdateCondetion = $UpdateCondetion;
    }



    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}
    public function HasAttribute($attribute){}
}