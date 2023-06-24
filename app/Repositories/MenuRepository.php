<?php

namespace App\Repositories;

use App\Models\Menu;
use App\Repositories\Abstract\AbstractRepository;

class MenuRepository extends AbstractRepository
{
    protected $modelClass=Menu::class;
}
