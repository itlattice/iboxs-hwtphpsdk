<?php

namespace iboxs\hwt\common;

use Exception;
use Redis;

class Base
{
    public static function requestApiClass($className,$companyNo=null,$appid=null,$appkey=null){
        $appid=$appid?$appid:hwtconfig('appid');
        $appkeyKey='appkey';
        if(hwtconfig('sanbox',0)>0){
            $appkeyKey='sanbox_appkey';
        }
        $appkey=$appkey?$appkey:hwtconfig($appkeyKey);
        $companyNo=$companyNo?$companyNo:hwtconfig('company_no');
        return new $className($companyNo,$appid,$appkey);
    }
}