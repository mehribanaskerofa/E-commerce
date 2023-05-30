<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeCategory extends Model
{

    protected $table='attribute_category';
    protected $guarded=[];
    public $timestamps=false;

//    public function product()
//    {
//        return $this->belongsTo(Product::class,'product_id','id');
//    }
}
