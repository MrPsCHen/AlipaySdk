<?php
//phpinfo();
use Originera\Alipay\Alipay;
use Originera\Alipay\AlipayToken;

define('ROOT',getcwd());
include ROOT.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

$ali = new Alipay();
$aliToken = new AlipayToken();
//$aliToken->fetch();
//$ali->inject(new \Original\Alipay\Member\Member());
//
//
//$ali->fetch();
echo $ali->alipayAuthCode('https://www.cpspt.com/api/alipay');
