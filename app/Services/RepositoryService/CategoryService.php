<?php

namespace App\Services\RepositoryService;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Repositories\CategoryRepository;
use App\Services\FileUploadService;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;

class CategoryService
{
    public function __construct(protected CategoryRepository $categoryRepository,
                                protected FileUploadService $fileUploadService)
    {
    }
    public function dataAllWithPaginate()
    {
        return $this->categoryRepository->paginate(10);
    }

    public function store($request)
    {
        $data=$request->all();
        $data['image']=$this->fileUploadService->uploadFile($request->image,'categories');
        $data['active']=$data['active'] ?? false;

        $model= $this->categoryRepository->save($data,new Category());
        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();
        if($request->has('image')){
            $data['image']=$this->fileUploadService->replaceFile($request->image,$model->image,'categories');
        }
        $data['active']=$data['active'] ?? false;

        $model=$this->categoryRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function delete($model)
    {
        self::ClearCached();
        return $this->categoryRepository->delete($model);
    }

    public function CachedCategories()
    {
        return Cache::rememberForever('categories',
            function (){
                return $this->categoryRepository->all(with:['translations']);
            });
    }

    public static function ClearCached()
    {
        Cache::forget('categories');
    }
}
