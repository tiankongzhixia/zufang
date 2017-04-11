<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/4/11
 * Time: 16:36
 */

namespace App\Http\Controllers;


class personal
{
    public function selecetData()
    {
        $cailbration = new calibrationCookie();

        if ($cailbration->calibrationCookie()) {
            $query = DB::table('house');
            if (is_array($_GET) && count($_GET) > 0) {
                $type = $_GET["type"];
                $region = $_GET["region"];
                $money = explode("-", $_GET["money"]);
                $room_type = $_GET["rtype"];
                $lease_type = $_GET["ltype"];
                switch ($lease_type){
                    case 1:
                        $lease_type = "一室";
                        break;
                    case 2:
                        $lease_type = "二室";
                        break;
                    case 3:
                        $lease_type = "三室";
                        break;
                    case 4:
                        $lease_type = "四室";
                        break;
                }
                $query = $query->where('type',$type)
                       ->where('region', 'like', '%' . $region . '%')
                       ->where('address_info', 'like', '%' . $region . '%')
                        ->where('room_type', 'like', '%' . $room_type . '%')
                        ->where('lease_type', 'like', '%' . $lease_type . '%')
                        ->whereBetween('money', [(int)$money[0],(int)$money[1]]);
            }
            return $query->orderBy('time','desc')->take(300)->paginate(10);

        } else {
            return "兄弟你懂得";
        }
    }


}