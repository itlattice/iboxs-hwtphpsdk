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

if(!function_exists('randStr')){
    function randStr($length = 10) {
        $str = "";
        $strPol = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz";
        $max = strlen($strPol)-1;
        for($i=0;$i<$length;$i++){
            $str.=$strPol[rand(0,$max)];
        }
        return $str;
    }
}
?>