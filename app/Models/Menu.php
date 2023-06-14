<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class Menu extends Model implements TranslatableContract
{
    use Translatable;

    protected $table='menus';
    protected $guarded=[];
    public $translationModel=MenuTranslation::class;
    public $translatedAttributes = ['title'];

}
