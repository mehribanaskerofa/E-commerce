<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use App\Services\FileUploadService;
use App\Services\RepositoryService\CategoryService;

class CategoryController extends Controller
{
    public function __construct(protected CategoryService $categoryService)
    {

    }

    public function index()
    {
        $models=$this->categoryService->dataAllWithPaginate();
        return view('admin.category.index',['models'=>$models]);
    }
    public function create()
    {
        $categories=$this->categoryService->CachedCategories();
        return view('admin.category.form',['categories'=>$categories]);
    }
    public function store(CategoryRequest $request)
    {
        $this->categoryService->store($request);
        return redirect()->route('admin.category.index');
    }
    public function edit(Category $category)
    {

        $categories=$this->categoryService->CachedCategories();
        return view('admin.category.form',['model'=>$category,'categories'=>$categories]);
    }
    public function update(CategoryRequest $categoryRequest, Category $category)
    {
        $this->categoryService->update($categoryRequest,$category);
        return redirect()->back();
    }
    public function destroy(Category $category)
    {
        $this->categoryService->delete($category);
        return redirect()->back();
    }
}