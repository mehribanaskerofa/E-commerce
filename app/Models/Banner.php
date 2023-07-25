<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Banner extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='banners';
    protected $guarded=[];
    public $translationModel=BannerTranslation::class;
    public $translatedAttributes = ['title','description'];

}
