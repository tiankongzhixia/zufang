<?php
/**
 * Created by PhpStorm.
 * User: hasee
 * Date: 2017/4/11
 * Time: 16:36
 */

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;


class personal
{
    public function selecetData()
    {
        $cailbration = new calibrationCookie();

        if ($cailbration->calibrationCookie()) {
            $query = DB::table('house')->select('title','url','type','money','city','create_time','region','region2','room_type','address_info','lease_type','area','pay_type','img_url');
            if (is_array($_GET) && count($_GET) > 0) {
                if (isset($_GET["type"])) {
                    $type = $_GET["type"];
                    $query = $query->where('type', $type);
                }
                if (isset($_GET["region"])){
                    $region = $_GET["region"];
                    $query = $query->where('region', 'like', '%' . $region . '%');
                }
                if (isset($_GET["region2"])){
                    $region2 = $_GET["region2"];
                    $query = $query->where('region2', 'like', '%' . $region2 . '%');
                }
                if (isset($_GET["money"])){
                    $money = explode("-", $_GET["money"]);
                    $query = $query->whereBetween('money', [(int)$money[0],(int)$money[1]]);
                }
                if (isset($_GET["ltype"])){
                    $lease_type = $_GET["ltype"];
                    $query = $query->where('lease_type', 'like', '%' . $lease_type . '%');
                }
                if (isset($_GET["rtype"])){
                    $room_type = $_GET["rtype"];
                    switch ($room_type){
                        case '一室':
                            $room_type = "1室";
                            break;
                        case '两室':
                            $room_type = "2室";
                            break;
                        case '三室':
                            $room_type = "3室";
                            break;
                        case '四室':
                            $room_type = "4室";
                            break;
                        case '五室':
                            $room_type = "5室";
                            break;
                        case '六室':
                            $room_type = "6室";
                            break;
                    }
                    $query = $query->where('lease_type', 'like', '%' . $room_type . '%');
                }
            }

            return $query->orderBy('create_time','desc')->take(300)->paginate(10);

        } else {
            return "兄弟你懂得";
        }
    }


}