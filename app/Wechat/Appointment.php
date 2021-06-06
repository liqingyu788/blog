<?php

namespace App\Wechat;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $table = 'user_info';

    /*
     * @param $openid
     * 查询默认就诊人
     */
    public static function getDefaultPatient(){
        $openid = 'oL46e0YPY4R28VqsWadBdHqDfoY8';
        $data = UserInfo::where(array("openid" => $openid, "is_default" => 1))->find();
        if (!$data) {
            $data = UserInfo::where(array("openid" => $openid))->find();
        }
        if ($data) {
            if (!$data->qrcode) {
                $card = $data->card_no ? $data->card_no : $data->identity_card;
                $carn = date('Ymd') . rand('999', '9999') . $card;

                Qrcode::genereateQrcodePNG($card, ROOT_PATH . "/public/upload/qrcode/" . $carn . ".png");
                $qrcode = "/upload/qrcode/" . $carn . ".png";
                UserInfo::where('id', $data->id)->update(array("qrcode" => $qrcode));
            }
        }
        return $data;
    }

    /*
    * @param $openid
    * 查询全部就诊人
    * 默认就诊人first展示
    */
    public static function getAllPatients(){
        $data = [];
        $openid = 'oL46e0YPY4R28VqsWadBdHqDfoY8';
        $data = UserInfo::where("openid='{$openid}' and (is_temporary is null or is_temporary='')")->order("is_default DESC")->select();
        return $data;
    }

    /**
     * 计算两点地理坐标之间的距离
     * @param Decimal $longitude1 起点经度
     * @param Decimal $latitude1 起点纬度
     * @param Decimal $longitude2 终点经度
     * @param Decimal $latitude2 终点纬度
     * @param Int $unit 单位 1:米 2:公里
     * @param Int $decimal 精度 保留小数位数
     * @return Decimal
     */
    public static function getDistance($longitude1, $latitude1, $longitude2, $latitude2, $unit = 2, $decimal = 2)
    {
        $EARTH_RADIUS = 6370.996; // 地球半径系数
        $PI = 3.1415926;

        $radLat1 = $latitude1 * $PI / 180.0;
        $radLat2 = $latitude2 * $PI / 180.0;

        $radLng1 = $longitude1 * $PI / 180.0;
        $radLng2 = $longitude2 * $PI / 180.0;

        $a = $radLat1 - $radLat2;
        $b = $radLng1 - $radLng2;

        $distance = 2 * asin(sqrt(pow(sin($a / 2), 2) + cos($radLat1) * cos($radLat2) * pow(sin($b / 2), 2)));
        $distance = $distance * $EARTH_RADIUS * 1000;

        if ($unit == 2) {
            $distance = $distance / 1000;
        }
        return round($distance, $decimal);
    }
}
