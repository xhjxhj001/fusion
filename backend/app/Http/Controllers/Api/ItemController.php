<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Model\Item;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ItemController extends Controller
{
    use BaseController;

    public function getItemInfo($id, Request $request)
    {
        $info = Item::where('id', $id)->first();
        if($info){
            return $this->returnJson($info);
        }else{
            return $this->returnJson();
        }
    }
}
