<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 13:08
 *
 */
 /*
  "type"=>"textarea"
            ,"options"=>array(
                "class"=>array()
,"other"=>array(
        "rows"=>3
    ,"cols"=>50
    ,"value"=>""
    ,"data_Id"=>""
    )
)
            ,"name"=>"LA_Titre"
            ,"label"=>"Titre: "

*/
namespace evalLib\MetaRecords;


class RecordForm implements Record
{

    private $_type;
    private $_other;
    private $_class;
    private $_name;
    private $_id;

    /**
     * @return mixed
     */
    public function getList()
    {
        return $this->_list;
    }

    /**
     * @param mixed $list
     */
    public function setList($list)
    {
        $this->_list = $list;
    }
    private $_label;
    private $_list;
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
     * @return mixed
     */
    public function getClass()
    {
        return $this->_class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->_class = $class;
    }

    /**
     * @return mixed
     */
    public function getOther()
    {
        return $this->_other;
    }

    /**
     * @param mixed $other
     */
    public function setOther($other)
    {
        $this->_other = $other;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->_id = $id;
    }

    /**
     * @return mixed
     */
    public function getLabel()
    {
        return $this->_label;
    }

    /**
     * @param mixed $label
     */
    public function setLabel($label)
    {
        $this->_label = $label;
    }



    public function toJson() {}
    public function FromJsonString(string $JsonString){

        $JsonDecode = json_decode($JsonString);
        $this->_name=isset($JsonDecode['name']) ? $JsonDecode['name'] : "";
        $this->_label=isset($JsonDecode['label']) ? $JsonDecode['label'] : "";
        $this->_id =isset($JsonDecode['id']) ? $JsonDecode['id'] : "";
        $this->_other=isset($JsonDecode['other']) ? $JsonDecode['other'] : "";
        $this->_class=isset($JsonDecode['class']) ? $JsonDecode['class'] : "";
    }

    public function FromArray($JsonDecode){
        $this->_name=isset($JsonDecode['name']) ? $JsonDecode['name'] : "";
        $this->_label=isset($JsonDecode['label']) ? $JsonDecode['label'] : "";
        $this->_id =isset($JsonDecode['id']) ? $JsonDecode['id'] : "";
        $this->_other=isset($JsonDecode['other']) ? $JsonDecode['other'] : "";
        $this->_class=isset($JsonDecode['class']) ? $JsonDecode['class'] : "";
    }

    public function HasAttribute($attribute){

    }
}