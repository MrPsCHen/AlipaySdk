<?php

namespace Originera\Alipay;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

class AlipayToken extends AlipayModule
{
    public string $method = 'authorization_code';
    public string $grant_type = '';

    private static bool $need_token = true;


    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @throws GuzzleException
     */
    function fetch(): array
    {
        $params = $this->getVers();
        $client = new Client(['timeout'=>5]);
        $response = $client->request('post',self::member_url,['json'=>$params]);
        return $this->getVers();
    }
}