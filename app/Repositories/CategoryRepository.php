<?php

namespace App\Repositories;

use App\Models\Category;
use App\Repositories\Abstract\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    protected $modelClass=Category::class;
}
