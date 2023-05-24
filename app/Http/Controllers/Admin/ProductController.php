<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Http\Requests\ProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\FileUploadService;
use App\Services\RepositoryService\CategoryService;
use App\Services\RepositoryService\ProductService;

class ProductController extends Controller
{

    public function __construct(protected ProductService $productService)
    {

    }

    public function index()
    {
        $models=$this->productService->dataAllWithPaginate();
        return view('admin.product.index',['models'=>$models]);
    }
    public function create(CategoryService $categoryService)
    {
        $categories=$categoryService->CachedCategories();
        return view('admin.product.form',['categories'=>$categories]);
    }
    public function store(ProductRequest $request)
    {
        $this->productService->store($request);
        return redirect()->route('admin.product.index');
    }
    public function edit(Product $product,CategoryService $categoryService)
    {
        $categories=$categoryService->CachedCategories();
        return view('admin.product.form',['model'=>$product,'categories'=>$categories]);
    }
    public function update(ProductRequest $productRequest, Product $product)
    {
        $this->productService->update($productRequest,$product);
        return redirect()->back();
    }
    public function destroy(Product $product)
    {
        $this->productService->delete($product);
        return redirect()->back();
    }
}
