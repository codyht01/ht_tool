<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2022/3/27
 * Time: 12:04
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace Htlove;


class Str
{
    use Singleton;
    /**
     * 获取指定长度的验证码 默认4位
     * @param int $len
     * @return int
     */
    public function randCode(int $len = 4): int
    {
        $rand = rand(1000, 9999);
        if ($len == 6) {
            $rand = rand(100000, 999999);
        }
        return $rand;
    }

    /**
     * 获取指定长度长度的随机字符串 默认8位
     * @param int $length
     * @return string
     */
    public function randStr(int $length = 8): string
    {
        // 密码字符集，可任意添加你需要的字符
        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()-_[]{}<>~`+=,.;:/?|";
        $str = "";
        for ($i = 0; $i < $length; $i++) {
            // 这里提供两种字符获取方式
            // 第一种是使用 substr 截取$chars中的任意一位字符；
            // 第二种是取字符数组 $chars 的任意元素
            // $password .= substr($chars, mt_rand(0, strlen($chars) – 1), 1);
            $str .= $chars[mt_rand(0, strlen($chars) - 1)];
        }
        return $str;
    }

    /**
     * 根据时间获取全数字长度
     * @return string
     */
    public function RandNumberStr(): string
    {
        return date('YmdHis') . rand(100000, 999999);
    }

    /**
     * 获取唯一订单号
     * @param string $prefix
     * @return string
     */
    public function create_trade_no(string $prefix = ''): string
    {
        return $prefix . date('YmdHis', time()) . substr(microtime(), 2, 6) . sprintf('%03d', rand(0, 999));
    }
}