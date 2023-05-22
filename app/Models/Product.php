<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Product extends Model implements TranslatableContract
{
//    use HasFactory;
    use Translatable;

    protected $table='products';
    protected $guarded=[];
    public $translationModel=ProductTranslation::class;
    public $translatedAttributes = ['title','slug'];
}
