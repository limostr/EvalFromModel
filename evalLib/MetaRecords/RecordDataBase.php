<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 14/05/2018
 * Time: 14:29
 */

namespace evalLib\MetaRecords;
use evalLib\MetaRecords\Record;

class RecordDataBase implements Record
{
    public $_Init;

    public $_Record_Load;
    public $_Record_Insert;

    public function Init($RecordDB){
        $this->_Record_Load=new  \evalLib\MetaRecords\RecordDB\RecordLoader();
        $this->_Record_Load->init($RecordDB['loader']);

        foreach ($RecordDB['insert'] as $keyinsert => $valinsert){
            $this->_Record_Insert[$keyinsert]=new \evalLib\MetaRecords\RecordDB\RecordInsert();
            $this->_Record_Insert[$keyinsert]->init($valinsert);

        }
        $this->_Init=$RecordDB['init'];

    }



    /**
     * @return mixed
     */
    public function getCompEval()
    {
        return $this->CompEval;
    }

    /**
     * @param mixed $CompEval
     */
    public function setCompEval($CompEval)
    {
        $this->CompEval = $CompEval;
    }

    /**
     * @return mixed
     */
    public function getInit()
    {
        return $this->_Init;
    }

    /**
     * @param mixed $Init
     */
    public function setInit($Init)
    {
        $this->_Init = $Init;
    }

    /**
     * @return mixed
     */
    public function getRecordLoad() : \evalLib\MetaRecords\RecordDB\RecordLoader
    {
        return $this->_Record_Load;
    }

    /**
     * @param mixed $Record_Load
     */
    public function setRecordLoad($Record_Load)
    {
        $this->_Record_Load = $Record_Load;
    }

    /**
     * @return mixed
     */
    public function getRecordInsert()
    {
        return $this->_Record_Insert;
    }

    /**
     * @param mixed $Record_Insert
     */
    public function setRecordInsert($Record_Insert)
    {
        $this->_Record_Insert = $Record_Insert;
    }

    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}
    public function HasAttribute($attribute){}
}