<?php

namespace App\Repositories;

use App\Models\Product;
use App\Repositories\Abstract\AbstractRepository;

class ProductRepository extends AbstractRepository
{
    protected $modelClass=Product::class;
}
