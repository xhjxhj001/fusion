<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 2018/12/12
 * Time: 2:05 PM
 */

namespace App\Http\Controllers;


class BaseController extends Controller
{
    protected $errno = 0;
    protected $errmsg = 'success';
    protected $resArr = array();

    protected function returnJson($data = null)
    {
        $res['errno'] = $this->errno;
        $res['errmsg'] = $this->errmsg;
        if($this->errno == 0){
            $res['data'] = $data;
        }
        return json_encode($res);
    }

}