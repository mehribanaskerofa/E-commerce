<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Category extends Model implements TranslatableContract
{
//    use HasFactory;
    use Translatable;

    protected $table='categories';
    protected $guarded=[];
    public $translationModel=CategoryTranslation::class;
    public $translatedAttributes = ['title','slug'];

    public function parent()
    {
        return $this->belongsTo(Category::class,'parent_id','id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class,AttributeCategory::class,'category_id','attribute_id');
    }
}
