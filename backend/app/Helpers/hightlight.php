<?php

namespace App\Helpers;

class Hightlight{
    public static function show($input, $paramsSearch, $field){
        if($paramsSearch['value'] == ''){
            return $input;
        }
        if($paramsSearch['field'] == 'all' || $paramsSearch['field'] == $field){
            return preg_replace("/".\preg_quote($paramsSearch['value'], "/")."/i", "<span style='background-color: yellow'>$0</span>", $input);
        }
        return $input;
    }
}