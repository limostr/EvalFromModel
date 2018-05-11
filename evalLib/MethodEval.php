<?php
/**
 * Created by PhpStorm.
 * User: o.limam
 * Date: 10/05/2018
 * Time: 13:47
 */

namespace evalLib;


Abstract class MethodEval
{

    public static function SUM(){
        $parameters = func_get_args();
        $number_of_arguments = func_num_args();

        if($number_of_arguments>=1){
            $res=0;
            foreach ($parameters as $val){
                $res+=$val;
            }
            return $res;
        }else{
            return 0;
        }
    }

    public static function MAX(){
        $parameters = func_get_args();
        $number_of_arguments = func_num_args();

    }

    public static function MOYART(){
        $parameters = func_get_args();
        $number_of_arguments = func_num_args();
        if($number_of_arguments>=1){
            $res=0;
            foreach ($parameters as $val){
                $res+=$val;
            }
            if($number_of_arguments>0){
                return $res/$number_of_arguments;
            }
            return 0;

        }else{
            return 0;
        }
    }

}