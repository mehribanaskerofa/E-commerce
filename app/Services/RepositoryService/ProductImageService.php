<?php

namespace App\Services\RepositoryService;


use App\Models\ProductImage;
use App\Repositories\ProductImageRepository;
use App\Services\FileUploadService;


class ProductImageService
{
    public function __construct(protected ProductImageRepository $productImageRepository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate($productId)
    {
        return $this->productImageRepository->query()->where('product_id',$productId)->orderBy('sort_order','asc')->paginate(5);
    }

    public function store($request)
    {
        $data=$request->all();
        $data['image']=$this->fileUploadService->uploadFile($request->image,'product_images');

        $model= $this->productImageRepository->save($data,new ProductImage());
        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();
        $data['image']=$this->fileUploadService->replaceFile($request->image,$model->image,'product_images');

        $model=$this->productImageRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        $this->fileUploadService->removeFile($model->image);
        return $this->productImageRepository->delete($model);
    }

    public function sortElements($sortList)
    {
        $orderData=[];
        foreach ($sortList['order'] as $sort_order=> $imageId){
            $orderData[]=[
              'id'=>$imageId,
                'sort_order'=>$sort_order
            ];
//            $this->query()->where('id',$imageId)->update(['sort_order'=>$sort_order]); // diger yontem
        }
        ProductImage::massUpdate(
            values:$orderData,
            uniqueBy:"id"
        );

    }
    public function CachedCategories()
    {
//        return Cache::rememberForever('sil',
//            function (){
//                return $this->productImageRepository->all(with:['translations']);
//            });
    }

    public static function ClearCached()
    {
//        Cache::forget('categories');
    }
}
