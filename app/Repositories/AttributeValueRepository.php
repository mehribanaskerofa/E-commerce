<?php

namespace App\Repositories;

use App\Models\AttributeValue;
use App\Repositories\Abstract\AbstractRepository;

class AttributeValueRepository extends AbstractRepository
{
    protected $modelClass=AttributeValue::class;
}
