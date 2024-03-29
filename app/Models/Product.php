<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='products';
    protected $guarded=[];
//    protected $with=['types'];
    public $translationModel=ProductTranslation::class;
    public $translatedAttributes = ['title','slug','description','specification'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }

    public function images()
    {
        return $this->hasMany(ProductImage::class,'product_id','id');
    }
    public function attributeValues()
    {
        return $this->belongsToMany(AttributeValue::class,AttributeValueProduct::class,'attribute_value_id','product_id');
    }

    public function types()
    {
        return $this->hasMany(ProductType::class,'product_id','id');
    }
    public function reviews()
    {
        return $this->hasMany(Review::class,'product_id','id');
    }
}
