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

}
