<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2022/5/11
 * Time: 15:02
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace Htlove;

trait Singleton
{
    private static $_instance;

    /**
     *
     */
    public function __construct()
    {
    }

    /**
     * @return mixed
     */
    public static function getInstance()
    {
        if (empty(self::$_instance)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
}