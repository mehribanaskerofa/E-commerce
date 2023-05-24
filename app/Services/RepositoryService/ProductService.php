<?php

namespace App\Services\RepositoryService;

use App\Models\Product;
use App\Repositories\ProductRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;

class ProductService
{
    public function __construct(protected ProductRepository $productRepository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->productRepository->paginate(10,['category.translations']);
    }

    public function store($request)
    {
        $data=$request->all();
        $data['image']=$this->fileUploadService->uploadFile($request->image,'product_images');
        $data['active']=$data['active'] ?? false;

        $model= $this->productRepository->save($data,new Product());
        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();
        if($request->has('image')){
            $data['image']=$this->fileUploadService->replaceFile($request->image,$model->image,'product_images');
        }
        $data['active']=$data['active'] ?? false;

        $model=$this->productRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        $this->fileUploadService->removeFile($model->image);
        return $this->productRepository->delete($model);
    }

    public function CachedProducts()
    {
        return Cache::rememberForever('products',
            function (){
                return $this->productRepository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('products');
    }
}
