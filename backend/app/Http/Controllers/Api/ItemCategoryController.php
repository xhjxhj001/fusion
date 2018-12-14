<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\BaseController;
use App\Model\ItemCategory;

class ItemCategoryController extends BaseController
{
    /**
     * get item category list
     * @return false|string
     */
    public function getItemCategoryList()
    {
        $info = ItemCategory::getCategoryList();
        return $this->returnJson($info);
    }
}
