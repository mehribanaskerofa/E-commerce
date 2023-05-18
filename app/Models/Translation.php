<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Translation extends Model
{
//    use HasFactory;
    use HasTranslations;


    protected $table='translation';
    protected $guarded=[];
    public $translatable = ['value'];
}
