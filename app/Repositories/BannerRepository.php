<?php

namespace App\Repositories;

use App\Models\Banner;
use App\Repositories\Abstract\AbstractRepository;

class BannerRepository extends AbstractRepository
{
    protected $modelClass=Banner::class;
}
