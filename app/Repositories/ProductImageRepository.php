<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\ProductImage;
use App\Repositories\Abstract\AbstractRepository;

class ProductImageRepository extends AbstractRepository
{
    protected $modelClass=ProductImage::class;
}
