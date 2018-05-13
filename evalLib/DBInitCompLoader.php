<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 12:40
 */

namespace evalLib;


class DBInitCompLoader
{
    private $CompEval;
    private $_Init;
    private $_Record_Load;
    private $_Record_Insert;

    public  function __construct(CompEvaluation &$CompEval)
    {
        $this->CompEval=$CompEval;
    }


    public function init($RecordDB){
        $this->_Record_Load=new  \evalLib\MetaRecords\RecordLoader();
        $this->_Record_Load->init($RecordDB['sql']);


        $this->_Record_Insert=new \evalLib\MetaRecords\RecordInsert();
        $this->_Record_Insert->init($RecordDB['insert']);
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
        return $this->Init;
    }

    /**
     * @param mixed $Init
     */
    public function setInit($Init)
    {
        $this->Init = $Init;
    }

    /**
     * @return mixed
     */
    public function getRecordLoad()
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



}