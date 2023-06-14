<?php

namespace App\Services\RepositoryService;

use App\Models\Banner;
use App\Repositories\BannerRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class BannerService
{
    public function __construct(protected BannerRepository $bannerRepository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAll()
    {
        return $this->bannerRepository->paginate(['translations']);
    }

    public function store($request)
    {
        $data=$request->all();


        $data['image']=$this->fileUploadService->uploadFile($request->image,'banner_images');
        $data['active']=$data['active'] ?? false;

        $model= $this->bannerRepository->save($data,new Banner());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

        if($request->has('image')){
            $data['image']=$this->fileUploadService->replaceFile($request->image,$model->image,'banner_images');
        }
        $data['active']=$data['active'] ?? false;

        $model=$this->bannerRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        $this->fileUploadService->removeFile($model->image);
        return $this->bannerRepository->delete($model);
    }

    public function CachedBanners()
    {
        return Cache::rememberForever('banners',
            function (){
                return $this->bannerRepository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('banners');
    }
}
