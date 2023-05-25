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

    public function index($productId)
    {
        $models=$this->productImageService->dataAllWithPaginate($productId);
        return view('admin.product-image.index',['models'=>$models,'productId'=>$productId]);
    }
    public function create($productId)
    {
        return view('admin.product-image.form',compact('productId'));
    }
    public function store(ProductImageRequest $request)
    {
        $this->productImageService->store($request);
        return redirect()->route('admin.product-image.index',$request->product_id);
    }
    public function edit(ProductImage $productImage)
    {
        return view('admin.product-image.form',['model'=>$productImage,'productId'=>$productImage->product_id]);
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

    public function sort()
    {
        parse_str(request()->sortList,$sortList);
        $this->productImageService->sortElements($sortList);
    }
}
