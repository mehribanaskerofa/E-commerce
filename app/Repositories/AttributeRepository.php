<?php

namespace App\Repositories;

use App\Models\Attribute;
use App\Repositories\Abstract\AbstractRepository;

class AttributeRepository extends AbstractRepository
{
    protected $modelClass=Attribute::class;
}
