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
    private $_Sql;
    private $_Bind_Data;
    private $_Prepare_Data;
    private $_Data_Loaded;

    public function toJson() {}
    public function FromJsonString(string $JsonString){}
    public function FromArray($JsonString){}
    public function HasAttribute($attribute){}
}