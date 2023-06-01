<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AttributeValueProduct extends Model
{

    protected $table='attribute_value_product';
    protected $guarded=[];
    public $timestamps=false;

//    public function product()
//    {
//        return $this->belongsTo(Product::class,'product_id','id');
//    }
}
