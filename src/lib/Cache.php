<?php

namespace iboxs\hwt\lib;

use iboxs\redis\Redis;

trait Cache
{
    public function cacheKey(){
        return 'hwtopenapi_token';
    }

    public function getCacheToken(){
        try {
            $key = Redis::basic()->get($this->cacheKey());
        }catch (\Exception $ex){
            throw new \Exception('token缓存异常，请查看文档详细配置');
        }
        if($key!=null){
            return $key;
        }
        return false;
    }

    public function setTokenCache($token,$expire){
        $cacheTime=strtotime($expire)-time()-1800;
        try {
            Redis::basic()->set($this->cacheKey(),$token,$cacheTime);
        }catch (\Exception $ex){
            throw new \Exception('token缓存异常，请查看文档详细配置');
        }
        return $token;
    }

    public function newToken(){
        try {
            Redis::basic()->del($this->cacheKey());
        }catch (\Exception $ex){
            throw new \Exception('token缓存异常，请查看文档详细配置');
        }
        return $this->getToken();
    }
}