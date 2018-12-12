<?php
/**
 * Created by PhpStorm.
 * User: baidu
 * Date: 2018/12/12
 * Time: 2:05 PM
 */

namespace App\Http\Controllers;

trait BaseController
{
    protected $errno = 0;
    protected $errmsg = 'success';

    protected function returnJson($data = null)
    {
        $res['errno'] = $this->errno;
        $res['errmsg'] = $this->errmsg;
        $res['data'] = $data;
        return json_encode($res);
    }
}