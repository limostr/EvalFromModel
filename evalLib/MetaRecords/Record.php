<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 09/05/2018
 * Time: 14:30
 */

namespace evalLib\MetaRecords;


interface Record
{
    public function toJson() ;
    public function FromJsonString(string $JsonString);
    public function FromArray($JsonString);
    public function HasAttribute($attribute);
    public function toArray();
}