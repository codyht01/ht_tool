<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2022/5/11
 * Time: 15:36
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace Htlove\tool;

trait Singleton
{
    private static $instance;

    /**
     * @param mixed ...$args
     * @return static
     */
    static function getInstance(...$args)
    {
        if(!isset(static::$instance)){
            static::$instance = new static(...$args);
        }
        return static::$instance;
    }
}