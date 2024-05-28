<?php

namespace iboxs\hwt\common;

use iboxs\hwt\lib\{Cache, Http, Sign};

class BaseOperation
{
    use Http,Sign,Cache;
    public $appid;

    public $appkey;

    public $companyNo;

    public $sanBox=false;

    public $domain="http://hwt.gz8.co";

    protected $host='/openapi/v1/request';

    public function __construct($companyNo, $appid, $appkey)
    {
        $this->companyNo = $companyNo;
        $this->appid = $appid;
        $this->appkey = $appkey;
        $this->sanBox=hwtconfig('sanbox',0)>0;
        if($this->sanBox){
            $this->host.="-test";
        }
    }

    public function request($action,$datas){
        $data = array_filter($datas, function ($value) {
            return $value !== null;
        });
        $data['action']=$action;
        $data['request_id']=randStr(32);
        $data['companyNo']=$this->companyNo;
        $token=$this->getToken();
        $headers = [
            'Content-Type: application/json', // 必须设置，表明请求体是JSON格式
            'Authorization: '.$token, // 示例：添加JWT令牌或其他认证信息
        ];
        $response=$this->postJson($this->domain.$this->host, $data, $headers);
        if($response['code']!=-403.101){
            return $response;
        }
        $headers[1]='Authorization: '.$this->newToken();
        $response=$this->postJson($this->domain.$this->host, $data, $headers);
        return $response;
    }
}