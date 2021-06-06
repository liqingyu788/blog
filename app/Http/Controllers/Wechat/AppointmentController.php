<?php

namespace App\Http\Controllers\Wechat;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    //

    public function index()
    {
        echo 1;die;
        $openid = env('openid');
        $data = \app\wechat\model\Common::getDefaultPatient(); //默认就诊人
        $allPatients = \app\wechat\model\Common::getAllPatients(); //全部就诊人

        /*最近使用菜单*/
        $info = VisitLog::query("select * from check_visit_log v LEFT JOIN check_wechat_menu w on v.menu_id=w.id where openid='{$openid}' ORDER BY num desc limit 0,4");
        if ($info) {
            $this->assign("menu", $info);
        }

        $this->quickMenu();

        if (!empty($data)) {
            $hlw_count = HlwReply::where(['user_id' => $data['id'], 'who_reply' => 'doctor', 'read' => 0])->count();
            $list_count = Db::name("msg_list")->where('unread', '1')->where('open_id', $openid)->where('user_info_id', $data['id'])->count();
            $msg_count = $hlw_count + $list_count;
        } else {
            $msg_count = 0;
        }


        return view('index', [
                'msg_count' => $msg_count,
                'patients' => $allPatients,
                'data' => $data,
                'openid' => $openid,
                'appid' => env('appid')
            ]
        );
    }


}
