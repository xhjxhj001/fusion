<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Model\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends BaseController
{
    /**
     * get item info by id function
     * @param $id
     * @param Request $request
     * @return false|string
     */
    public function getItemInfo($id, Request $request)
    {
        $info = Item::getItemInfoById($id);
        if ($info) {
            return $this->returnJson($info);
        } else {
            return $this->returnJson();
        }
    }

    public function getItemList()
    {
        $conds = array(
            array('status','=',1)
        );
        $info = Item::getItemListByConds($conds);
        return $this->returnJson($info);
    }

}
