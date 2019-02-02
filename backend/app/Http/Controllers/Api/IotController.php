<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class IotController extends BaseController
{
    public function getMonitorInfo($id)
    {
        $temp = Redis::get('monitor_temp_' . $id);
        $humi = Redis::get('monitor_humi_' . $id);
        $data = array(
            'temp' => $temp,
            'humi' => $humi
        );
        return $this->returnJson($data);
    }

    //
    public function setMonitorInfo($id, Request $request)
    {
        $temp = $request->temp;
        $humi = $request->humi;
        $res1 = Redis::set('monitor_temp_' . $id, $temp);
        $res2 = Redis::set('monitor_humi_' . $id, $humi);
        return $this->returnJson('success');
    }


    public function setIot(Request $request)
    {
        $arr_header[] = "Content-Type:application/json";
        $appId = getenv("EMQ_APP_ID");
        $secret = getenv("EMQ_APP_SECRET");
        $arr_header[] = "Authorization: Basic " . base64_encode($appId . ':' . $secret);

        $res = $this->request_post("localhost:8080", $request, $arr_header);
        var_dump($request, $res);
    }

    /**
     * 模拟post进行url请求
     * @param string $url 请求url
     * @param string $param 请求参数
     * @return array|bool $data 返回结果
     **/
    public function request_post($url = '', $param = '', $header = null)
    {
        if (empty($url) || empty($param)) {
            return false;
        }
        $postUrl = $url;
        Log::info("[curl-request][url]:" . $url . "[body]:" . $param);
        $curlPost = $param;
        $ch = curl_init();//初始化curl
        curl_setopt($ch, CURLOPT_URL,$postUrl);//抓取指定网页
        curl_setopt($ch, CURLOPT_HEADER, 0);//设置header
        if(!empty($header)){
            curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        }
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
        curl_setopt($ch, CURLOPT_POST, 1);//post提交方式
        curl_setopt($ch, CURLOPT_POSTFIELDS, $curlPost);
        $data = curl_exec($ch);//运行curl
        Log::info("[curl-request][response]: " . $data);
        $data = json_decode($data, true);
        curl_close($ch);
        return $data;
    }
}
