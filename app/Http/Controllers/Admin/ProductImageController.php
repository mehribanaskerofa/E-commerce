<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductImageRequest;
use App\Models\ProductImage;
use App\Services\RepositoryService\ProductImageService;

class ProductImageController extends Controller
{
    public function __construct(protected ProductImageService $productImageService)
    {

    }

    public function index()
    {
        $models=$this->productImageService->dataAllWithPaginate();
        return view('admin.product-image.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.product-image.form');
    }
    public function store(ProductImageRequest $request)
    {
        $this->productImageService->store($request);
        return redirect()->route('admin.product-image.index');
    }
    public function edit(ProductImage $productImage)
    {

        return view('admin.product-image.form',['model'=>$productImage]);
    }
    public function update(ProductImageRequest $productImageRequest, ProductImage $productImage)
    {
        $this->productImageService->update($productImageRequest,$productImage);
        return redirect()->back();
    }
    public function destroy(ProductImage $productImage)
    {
        $this->productImageService->delete($productImage);
        return redirect()->back();
    }
}
