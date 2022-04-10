<?php

namespace Originera\Alipay\Member;

/**
 * 会员授权
 */
trait memberTraitAuthCode
{


    /**
     * 获取支付宝授权地址
     * @param string $redirect_uri 回调地址
     * @return string
     *
     */
    function alipayAuthCode(string $redirect_uri = ''): string
    {
        $alipay = $this;
        return self::auth_url.http_build_query([
            'app_id'        => $alipay::api_id,
            'scope'         => 'auth_user',
            'state'         => 'init',
            'redirect_uri'  => $redirect_uri
        ]);
    }

}