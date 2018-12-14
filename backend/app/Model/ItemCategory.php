<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ItemCategory extends Model
{
    protected $table = 'item_category';

    protected $primaryKey = 'id';

    public $timestamps = false;

    protected $fillable = array(
        'title',
        'status',
        'created_by',
        'updated_by',
        'created_at',
        'updated_at'
    );

    /**
     * get category info by id
     * @param $id
     * @param int $status
     * @return bool
     */
    public static function getCategoryInfoById($id, $status = 1)
    {
        $info = self::where(
            array(
                array('id','=',$id),
                array('status', '=', $status)
            )
        )->select('title')->first();
        if($info){
            return $info;
        }else{
            return false;
        }
    }

    /**
     * get category info by id
     * @param $id
     * @param int $status
     * @return bool
     */
    public static function getCategoryList($status = 1)
    {
        $info = self::where(
            array(
                array('status', '=', $status)
            )
        )->select('id', 'title')->get();
        if($info){
            return $info;
        }else{
            return false;
        }
    }

}
