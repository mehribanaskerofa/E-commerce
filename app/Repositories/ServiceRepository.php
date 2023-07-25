<?php

namespace App\Repositories;

use App\Models\Service;
use App\Repositories\Abstract\AbstractRepository;

class ServiceRepository extends AbstractRepository
{
    protected $modelClass=Service::class;
}
