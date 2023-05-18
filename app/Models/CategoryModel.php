<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;

class CategoryModel extends Model implements TranslatableContract
{
//    use HasFactory;
    use Translatable;

    protected $table='categories';
    protected $guarded=[];
    public $translationModel=CategoryTranslationModel::class;
    public $translatedAttributes = ['title','slug'];
}
