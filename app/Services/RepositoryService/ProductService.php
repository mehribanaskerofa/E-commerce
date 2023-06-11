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
        return $this->productRepository->paginate(9,['category.translations','attributeValues']);
    }

    public function store($request)
    {
        $data=$request->all();

        $attributes=collect($data['attributes'] ?? [])->flatten()->toArray();
        unset($data['attributes']);

        $types=collect($data['types'] ?? [])->flatten()->toArray();
        unset($data['types']);

        $data['image']=$this->fileUploadService->uploadFile($request->image,'product_images');
        $data['active']=$data['active'] ?? false;

        $model= $this->productRepository->save($data,new Product());

        if($attributes)
        $model->attributeValues()->attach($attributes);

        if ($types)
        $model->types()->insert(collect($types)->map(fn($type) => ['product_id' => $model->id, 'type' => $type])->toArray());

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

//        dd($data);

//        if($data['attributes']) {
            $attributes = collect($data['attributes'] ?? [])->flatten()->toArray();
            unset($data['attributes']);
            $model->attributeValues()->sync($attributes);
//        }

        if ($data['types']) {
            $types = collect($data['types'] ?? [])->flatten()->toArray();
            unset($data['types']);
            $model->types()->where('id', $model->id)->delete();
            $model->types()->insert(collect($types)->map(fn($type) => ['product_id' => $model->id, 'type' => $type])->toArray());
        }

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
        foreach ($model->images as $productImage){
            $this->fileUploadService->removeFile($productImage->image);
        }
        self::ClearCached();
        $this->fileUploadService->removeFile($model->image);
        return $this->productRepository->delete($model);
    }

    public function getProductsByType($type,$limit=10)
    {
        return $this->productRepository
            ->query()
            ->with('translations','category.translations','attributeValues.translations')
            ->whereHas('types',function ($q) use ($type){
                return $q->where('type',$type);
            })
            ->inRandomOrder()
            ->limit($limit)
            ->get();
    }

    public function getProductsByCategoryId($categoryIds)
    {
        return $this->productRepository->query()
            ->whereIn('category_id',$categoryIds)
            ->with(['translations','category.translations','attributeValues'])
            ->paginate(10);
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
