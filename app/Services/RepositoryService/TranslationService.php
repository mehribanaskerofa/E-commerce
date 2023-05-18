<?php

namespace App\Services\RepositoryService;

use App\Models\Translation;
use App\Repositories\TranslationRepository;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

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
        $data=$request->all();
        $data['key']=Str::slug($data['key']);
        $model= $this->translationRepository->save($data,new Translation());
        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();
        $data['key']=Str::slug($data['key']);
        $model=$this->translationRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->translationRepository->delete($model);
    }

    public function CachedTranslations()
    {
        return Cache::rememberForever('translations',
            function (){
                return Translation::pluck('value','key')->toArray();
            });
    }

    public static function ClearCached()
    {
        Cache::forget('translations');
    }
}
