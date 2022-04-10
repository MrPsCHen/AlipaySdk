<?php

namespace Originera\Alipay\Member;
use Originera\Alipay\AlipayModule;

/**
 * Ali支付会员相关
 */
class Member extends AlipayModule
{
    public string $method       = 'alipay.system.oauth.token';
    public string $scope        = '';
    public string $redirect_uri = '';
    public string $state        = '';



    function fetch()
    {
        $params = self::getVers();

        var_export($params);

    }
}