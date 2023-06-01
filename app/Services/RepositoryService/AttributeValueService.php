<?php

namespace App\Services\RepositoryService;

use App\Models\AttributeValue;
use App\Repositories\AttributeValueRepository;
use Illuminate\Support\Facades\Cache;

class AttributeValueService
{
    public function __construct(protected AttributeValueRepository $attributeValueRepository)
    {
    }
    public function dataAll($attributeId)
    {
        return $this->attributeValueRepository->query()->where('attribute_id',$attributeId)->get();
            //->get(['attribute.translations']);
    }

    public function store($request)
    {
        $data=$request->all();
        $data['active']=$data['active'] ?? false;

        $model= $this->attributeValueRepository->save($data,new AttributeValue());
        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();
        $data['active']=$data['active'] ?? false;

        $model=$this->attributeValueRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->attributeValueRepository->delete($model);
    }

    public function CachedAttributeValues()
    {
        return Cache::rememberForever('attribute_values',
            function (){
                return $this->attributeValueRepository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('attribute_values');
    }
}
