<?php

namespace App\Repositories;

use App\Models\CategoryModel;
use App\Repositories\Abstract\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    protected $modelClass=CategoryModel::class;
}
