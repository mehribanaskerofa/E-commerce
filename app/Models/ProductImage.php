<?php

namespace App\Models;

use Iksaku\Laravel\MassUpdate\MassUpdatable;
use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    use MassUpdatable;

    protected $table='product_images';
    protected $guarded=[];

    public function product()
    {
        return $this->belongsTo(Product::class,'product_id','id');
    }
}
