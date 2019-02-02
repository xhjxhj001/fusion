<?php

namespace App\Http\Controllers\Api;

use Illuminate\Support\Facades\Redis;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class IotController extends BaseController
{
    public function  getMonitorInfo($id)
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
    public function  setMonitorInfo($id, Request $request)
    {
	$temp = $request->temp;
	$humi = $request->humi;
	$res1 = Redis::set('monitor_temp_' . $id, $temp);
        $res2 = Redis::set('monitor_humi_' . $id, $humi);
        return $this->returnJson('success');
    }
}
