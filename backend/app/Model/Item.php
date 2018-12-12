<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';

    protected $primaryKey = 'id';

    protected $fillable = array(
        'name',
        'description',
        'image',
        'status',
        'price',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    /**
     * get Item info from DB
     * @param $id
     * @return array|bool
     */
    public static function getItemInfoById($id)
    {
        $res = self::where('id', $id)
            ->select('name', 'description', 'image', 'status', 'price')
            ->first();
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

    public static function getItemListByConds($conds)
    {
        $res = self::where($conds)
            ->select('name', 'description', 'image', 'status', 'price')
            ->get();
        if ($res) {
            return $res;
        } else {
            return false;
        }
    }

}
