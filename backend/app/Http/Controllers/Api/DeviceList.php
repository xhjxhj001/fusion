<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 2019/2/2
 * Time: 8:24 PM
 */

namespace App\Http\Controllers\Api;

class DeviceList {

    /**
     * topic => device_no
     * @var array
     */
    static public $device_list = array(
        'my/bed_light/status' => 10001
    );

}