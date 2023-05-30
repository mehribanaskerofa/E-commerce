<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

class AttributeValue extends Model
{
    use Translatable;
    protected $table='attribute_values';
    protected $guarded=[];
    public $translationModel=AttributeValueTranslation::class;
    public $translatedAttributes = ['title'];

    public function attribute()
    {
        return $this->belongsTo(Attribute::class,'attribute_id','id');
    }
}
