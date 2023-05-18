<?php

namespace App\Services\RepositoryService;

use App\Models\Translation;
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

    public function store($request)
    {
        return $this->translationRepository->save($request->all(),new Translation());
    }
    public function update($request,$model)
    {
        return $this->translationRepository->save($request->all(),$model);
    }

    public function delete($model)
    {
        return $this->translationRepository->delete($model);
    }
}
