<?php
namespace Originera\Alipay;
use Originera\Alipay\Member\memberTraitAuthCode;

class Alipay implements AliConfig
{
    use memberTraitAuthCode;

    /** @var string|null 应用ID */
    static ?string $APP_ID  = null;
    static ?string $APP_NAME= null;
    static ?string $PID     = null;

    static ?AlipayModule $ALIPAY_MODULE = null;

    /**
     * 将功能模块注入实例
     *
     * 解释：功能模块AlipayModule是抽象类，需要继承实现
     * @param AlipayModule $alipayModule 抽象模块
     * @return $this
     */
    public function inject(AlipayModule $alipayModule): Alipay
    {
        $alipayModule->setAlipay($this);
        self::$ALIPAY_MODULE = $alipayModule;
        return $this;
    }


    /**
     * @return mixed
     */
    public function fetch(): mixed
    {
        return self::$ALIPAY_MODULE->fetch();
    }

    public function setAliConfig(AliConfig $aliConfig)
    {

    }


}