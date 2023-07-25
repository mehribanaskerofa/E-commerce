<?php

namespace App\Services\RepositoryService;

use App\Models\Attribute;
use App\Repositories\AttributeRepository;
use Illuminate\Support\Facades\Cache;

class AttributeService
{
    public function __construct(protected AttributeRepository $attributeRepository)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->attributeRepository->paginate(10,['translations']);
    }
    public function dataAllWithoutPaginate()
    {
        return $this->attributeRepository->all(['translations']);
    }

    public function store($request)
    {
        $data=$request->all();
        $data['active']=$data['active'] ?? false;

        $model= $this->attributeRepository->save($data,new Attribute());
        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();
        $data['active']=$data['active'] ?? false;

        $model=$this->attributeRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->attributeRepository->delete($model);
    }

    public function CachedAttributes()
    {
        return Cache::rememberForever('attributes',
            function (){
                return $this->attributeRepository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('attributes');
    }
}
