<?php

namespace App\Repositories;

use App\Models\Translation;
use App\Repositories\Abstract\AbstractRepository;

class TranslationRepository extends AbstractRepository
{
    protected $modelClass=Translation::class;
}
