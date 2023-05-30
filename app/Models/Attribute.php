<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class Attribute extends Model
{
    use Translatable;
    protected $table='attributes';
    protected $guarded=[];
    public $translationModel=AttributeTranslation::class;
    public $translatedAttributes = ['title'];

    public function attributes()
    {
        return $this->belongsToMany(Category::class,AttributeCategory::class,'attribute_id','category_id');
    }

    public function values()
    {
        return $this->hasMany(AttributeValue::class,'attribute_id','id');
    }
}
