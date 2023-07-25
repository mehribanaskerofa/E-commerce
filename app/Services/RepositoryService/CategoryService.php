<?php

namespace App\Services\RepositoryService;

use App\Http\Requests\CategoryRequest;
use App\Models\AttributeCategory;
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
        return $this->categoryRepository->paginate(10,['products.translations','parent.translations']);//,'attributes:id'
    }

    public function store($request)
    {
        $data=$request->all();

        $data['image']=$this->fileUploadService->uploadFile($request->image,'categories');
        $data['active']=$data['active'] ?? false;
        $attributes=$data['attributes'] ?? [];
        unset($data['attributes']);

        $model= $this->categoryRepository->save($data,new Category());
        $model->attributes()->attach($attributes);//yoxla

        self::ClearCached();
        return $model;
    }
    public function update($request,$model)
    {
        $data=$request->all();

//        $attributes=[];
//        if(count($data['attributes'])>0){
//            foreach ($data['attributes'] as $attribute){
//                $attributes[]=[
//                    'category_id'=>$model->id,
//                    'attribute_id'=>$attribute->id
//                ];
//            }
//            AttributeCategory::where('category_id',$model->id)->delete();
//            AttributeCategory::insert($attributes);
//        }
        $model->attributes()->sync($data['attributes'] ?? []);//yoxla
        unset($data['attributes']);


        if($request->has('image')){
            $data['image']=$this->fileUploadService->replaceFile($request->image,$model->image,'categories');
        }
        $data['active']=$data['active'] ?? false;

        $model=$this->categoryRepository->save($data,$model);
        self::ClearCached();
        return $model;
    }

    public function findCategory($slug)
    {
//        $this->categoryRepository->getModelClass()->withCount(['products])
        return Category::with(['translations','products.translations','attributes.translations','attributes.values.translations'])->whereTranslation('slug',$slug,app()->getLocale())->first();
//            Category::whereTranslation('slug',$slug,app()->getLocale());
    }

    public function findChildIds($category_id)
    {
        return Category::select('id')->where('parent_id',$category_id)->pluck('id')->toArray();
    }
    public function delete($model)
    {
        self::ClearCached();
        $this->fileUploadService->removeFile($model->image);
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
