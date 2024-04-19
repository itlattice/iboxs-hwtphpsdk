<?php
if(!function_exists('hwtconfig')){
    function hwtconfig($key,$default=null){
        if(function_exists('config')){
            return config($key,$default);
        }
        $config=require __DIR__.'/config.php';
        return $config[$key]??$default;
    }
}
?>