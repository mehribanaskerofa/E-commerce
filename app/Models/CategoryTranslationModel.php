<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryTranslationModel extends Model
{
    protected $table='category_translations';
    protected $guarded=[];
    public $timestamps=false;
}
