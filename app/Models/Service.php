<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Service extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='services';
    protected $guarded=[];
    public $translationModel=ServiceTranslation::class;
    public $translatedAttributes = ['title','description'];

}
