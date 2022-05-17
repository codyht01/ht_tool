<?php
/**
 * Created by PhpStorm.
 * User: 小蛮哼哼哼
 * Email: 243194993@qq.com
 * Date: 2022/3/27
 * Time: 12:12
 * motto: 现在的努力是为了小时候吹过的牛逼！
 */

namespace Htlove;

use Htlove\tool\Singleton;

class Map
{
    use Singleton;
    /**
     * 计算两点之间的距离
     * @param float $lng1 经度1
     * @param float $lat1 纬度1
     * @param float $lng2 经度2
     * @param float $lat2 纬度2
     * @param int $unit 1 m，2 km
     * @param int $decimal 位数
     * @return float
     */
    public function getDistance(float $lng1, float $lat1, float $lng2, float $lat2, int $unit = 2, int $decimal = 2): float
    {

        $EARTH_RADIUS = 6370.996; // 地球半径系数
        $PI = 3.1415926535898;

        $radLat1 = $lat1 * $PI / 180.0;
        $radLat2 = $lat2 * $PI / 180.0;

        $radLng1 = $lng1 * $PI / 180.0;
        $radLng2 = $lng2 * $PI / 180.0;

        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;

        $distance = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $distance = $distance * $EARTH_RADIUS * 1000;

        if ($unit === 2) {
            $distance /= 1000;
        }

        return round($distance, $decimal);
    }

    /**
     * 获取指定范围的经纬度
     * @param float $lat 纬度
     * @param float $lng 经度
     * @param int $kilometers
     * @return \float[][]|\int[][]
     */
    public function getKilometers(float $lat, float $lng, int $kilometers = 5): array
    {
        $PI = 3.1415926535898;
        $EARTH_RADIUS = 6370.996;
        $range = 180 / $PI / $EARTH_RADIUS * $kilometers; //里面的 $kilometers 就代表搜索 km 之内，单位km
        $lngR = $range / cos($lat * $PI / 180);
        $maxLat = $lat + $range; //最大纬度
        $minLat = $lat - $range; //最小纬度
        $maxLng = $lng + $lngR; //最大经度
        $minLng = $lng - $lngR; //最小经度
        return [
            "min" => [
                $minLat,
                $maxLat
            ],
            "max" => [
                $minLng,
                $maxLng
            ]
        ];
    }
}