<?php

namespace Originera\Alipay;

use function Composer\Autoload\includeFile;

abstract class AlipayModule implements AliConfig
{
    public ?string $app_id;

    public ?string $charset = 'UTF-8';

    public ?string $sign_type = 'RSA2';

    public ?string $version = '1.0';

    public ?string $timestamp = '';

    public function __construct()
    {
        $this->app_id = self::api_id;
        $this->timestamp = date('Y-m-d H:i:s',time());
    }

    /**
     * 将实例注入进模块
     * @param Alipay $alipay
     */
    function setAlipay(Alipay $alipay){
        $this->app_id = $alipay::$APP_ID;
    }

    function getVers(): array
    {

        return array_merge(get_class_vars(get_class($this)),get_object_vars($this));
    }

    function sign(array &$params): array
    {
        ksort($params);
        $out_params = urldecode(http_build_query($params));
        $params['sign'] = $this->RSA2($out_params);
        return $params;
    }

    protected function RSA2($data): bool|string
    {
        if(openssl_pkey_get_private($this->getPrivateKey())){
            $open_res = openssl_get_privatekey($this->getPrivateKey());
            openssl_sign($data,$sign,$open_res,'SHA256');

            return base64_encode($sign);
        }else{
            return false;
        }
    }
    protected function getPrivateKey($filepath = './test/private2048.txt'): string
    {
        $privateKey = "-----BEGIN RSA PRIVATE KEY-----\n";
        $privateKey.= wordwrap(file_get_contents($filepath), 64, "\n", true);
        $privateKey.= "\n-----END RSA PRIVATE KEY-----";
        return $privateKey;

    }

    abstract function fetch();
}