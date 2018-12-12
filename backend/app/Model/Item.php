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
        $res =  self::where('id', $id)->first();
        if($res){
            $data = array(
                'id',
                'name',
                'description',
                'image',
                'status',
                'price',
            );
            return $data;
        }else{
            return false;
        }
    }

}
