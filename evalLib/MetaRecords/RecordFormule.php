<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 14:27
 */

namespace evalLib\MetaRecords;

/*

'Formule'=>array(
                   "F1"=> array('toEval'=>"{@Parent:Score}>=10 && {@Parent:Score} <12"
                    ,"score"=>1
                    ,"description"=>""
                    ,"decision"=>"Passable"

                )
            )

 */
class RecordFormule implements Record
{
    private $_Name="";
    private $_toEval="";
    private $_score="";
    private $_default="";
    private $_description="";
    private $_decision="";
    private $_type="";
    private $_bind="";

    public function __construct($type="",$Name="",$toEval="" ,$score="",$description="",$decision="",$default="",$bind="")
    {
        $this->_type=$type;
        $this->_Name=$Name;
        $this->_toEval=$toEval;
        $this->_score=$score;
        $this->_description=$description;
        $this->_decision=$decision;
        $this->_default=$default;
        $this->_bind =$bind;
    }



    /**
     * @return string
     */
    public function getName()
    {
        return $this->_Name;
    }

    /**
     * @param string $Name
     */
    public function setName($Name)
    {
        $this->_Name = $Name;
    }

    /**
     * @return string
     */
    public function getToEval()
    {
        return $this->_toEval;
    }

    /**
     * @param string $toEval
     */
    public function setToEval($toEval)
    {
        $this->_toEval = $toEval;
    }



    /**
     * @return string
     */
    public function getScore()
    {
        return $this->_score;
    }

    /**
     * @param string $score
     */
    public function setScore($score)
    {
        $this->_score = $score;
    }

    /**
     * @return string
     */
    public function getDefault()
    {
        return $this->_default;
    }

    /**
     * @param string $default
     */
    public function setDefault($default)
    {
        $this->_default = $default;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->_description = $description;
    }

    /**
     * @return string
     */
    public function getDecision()
    {
        return $this->_decision;
    }

    /**
     * @param string $decision
     */
    public function setDecision($decision)
    {
        $this->_decision = $decision;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->_type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->_type = $type;
    }

    /**
     * @return string
     */
    public function getBind()
    {
        return $this->_bind;
    }

    /**
     * @param string $bind
     */
    public function setBind($bind)
    {
        $this->_bind = $bind;
    }


    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}

    public function HasAttribute($attribute){}

}