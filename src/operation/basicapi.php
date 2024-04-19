<?php

namespace iboxs\hwt\operation;

use iboxs\hwt\common\BaseOperation;

class basicapi extends BaseOperation
{
    /**
     * 物流轨迹查询接口
     * @param $external 用户系统订单号
     * @param $express 花务通订单号
     * @return array|false
     */
    public function queryOrderroute($external=null,$express=null){
        $action='basic.query.orderroute';
        $data=[
            'external'=>$external,
            'express'=>$express
        ];
        return $this->request($action,$data);
    }
    /**
     * 公共物流轨迹查询接口
     * @param $express 花务通订单号
     * @param $phone 收件人或发货人的手机号后四位
     * @return array|false
     */
    public function queryPublicorderroute($express,$phone){
        $action='basic.query.publicorderroute';
        $data=[
            'phone'=>$phone,
            'express'=>$express
        ];
        return $this->request($action,$data);
    }
}