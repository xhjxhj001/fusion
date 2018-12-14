<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Model\Item;
use Illuminate\Http\Request;

class ItemController extends BaseController
{

    /**
     * get item info by id function
     * @param $id
     * @return false|string
     */
    public function getItemInfo($id)
    {
        $info = Item::getItemInfoById($id);
        if ($info) {
            return $this->returnJson($info);
        } else {
            return $this->returnJson();
        }
    }

    /**
     * get Recommend Item List
     * @return false|string
     */
    public function getRecommendList()
    {
        $conds = array(
            array('status', '=', 2)
        );
        $info = Item::getItemListByConds($conds);
        foreach ($info as &$item) {
            if (substr($item['price'], -2) == '00') {
                $item['price'] = substr($item['price'], 0, strlen($item['price']) - 3);
            };
        }
        return $this->returnJson($info);
    }

    /**
     * get Item List info
     * @param $request
     * @return false|string
     */
    public function getItemList(Request $request)
    {
        $category_id = $request['category_id'];
        $conds = array(
            array('status', '>', 0)
        );
        if($category_id){
            $conds[] = array('category_id', '=', $category_id);
        }
        $info = Item::getItemListByConds($conds);
        foreach ($info as &$item) {
            if (substr($item['price'], -2) == '00') {
                $item['price'] = substr($item['price'], 0, strlen($item['price']) - 3);
            };
        }
        return $this->returnJson($info);
    }

}
