<?php

namespace App\Services\RepositoryService;

use App\Repositories\TranslationRepository;

class TranslationService
{
    public function __construct(protected TranslationRepository $translationRepository)
    {

    }

    public function dataAllWithPaginate()
    {
        return $this->translationRepository->paginate(10);
    }
}
