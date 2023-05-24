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
    public $translationModel=ProductTranslation::class;
    public $translatedAttributes = ['title','slug','description','specification'];

    public function category()
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
