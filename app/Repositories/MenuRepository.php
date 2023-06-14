<?php

namespace App\Repositories;

use App\Repositories\Abstract\AbstractRepository;
use App\View\Components\Menu;

class MenuRepository extends AbstractRepository
{
    protected $modelClass=Menu::class;
}
