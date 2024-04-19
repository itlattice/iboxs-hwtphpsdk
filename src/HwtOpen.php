<?php

namespace iboxs\hwt;

use iboxs\hwt\common\Base;
use iboxs\hwt\operation\basicapi;
use iboxs\hwt\operation\shopapi;

class HwtOpen extends Base
{
    /**
     * 调用发货商接口
     * @param $companyNo 绑定的公司编号(可使用配置文件配置，若传入的，以传入值为准)
     * @param $appid APPID(可使用配置文件配置，若传入的，以传入值为准)
     * @param $appkey APPKEY(可使用配置文件配置，若传入的，以传入值为准)
     * @return
     */
    public static function Shop($companyNo=null,$appid=null,$appkey=null){
        $className=shopapi::class;
        if(class_exists($className)){
            return self::requestApiClass($className,$companyNo,$appid,$appkey);
        }
        throw new \Exception("未找到类：".$className);
    }
    /**
     * 调用基础通用接口
     * @param $companyNo 绑定的公司编号(可使用配置文件配置，若传入的，以传入值为准)
     * @param $appid APPID(可使用配置文件配置，若传入的，以传入值为准)
     * @param $appkey APPKEY(可使用配置文件配置，若传入的，以传入值为准)
     * @return
     */
    public static function Basic($companyNo=null,$appid=null,$appkey=null){
        $className=basicapi::class;
        if(class_exists($className)){
            return self::requestApiClass($className,$companyNo,$appid,$appkey);
        }
        throw new \Exception("未找到类：".$className);
    }
}
