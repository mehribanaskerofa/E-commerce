<?php

namespace App\Services\RepositoryService;

use App\Models\Service;
use App\Repositories\ServiceRepository;
use Illuminate\Support\Facades\Cache;

class ServiceService
{
    public function __construct(protected ServiceRepository $repository)
    {
    }
    public function dataAll()
    {
        return $this->repository->paginate(4,['translations']);
    }

    public function store($request)
    {
        $data=$request->all();


        $data['active']=$data['active'] ?? false;

        $model= $this->repository->save($data,new Service());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        $data['active']=$data['active'] ?? false;

        $model=$this->repository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->repository->delete($model);
    }

    public function CachedServices()
    {
        return Cache::rememberForever('services',
            function (){
                return $this->repository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('services');
    }
}
