<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Models\Attribute;
use App\Models\AttributeValueProduct;
use App\Models\Category;
use App\Services\RepositoryService\AttributeService;

class AttributeController extends Controller
{

    public function __construct(protected AttributeService $attributeService)
    {

    }

    public function index()
    {
        $models=$this->attributeService->dataAllWithPaginate();
        return view('admin.attribute.index',['models'=>$models]);
    }
    public function create()
    {
        return view('admin.attribute.form');
    }
    public function store(AttributeRequest $request)
    {
        $this->attributeService->store($request);
        return redirect()->route('admin.attribute.index');
    }
    public function edit(Attribute $attribute)
    {
        return view('admin.attribute.form',['model'=>$attribute]);
    }
    public function update(AttributeRequest $attributeRequest, Attribute $attribute)
    {
        $this->attributeService->update($attributeRequest,$attribute);
        return redirect()->back();
    }
    public function destroy(Attribute $attribute)
    {
        $this->attributeService->delete($attribute);
        return redirect()->back();
    }

    public function getAttributesByCategory($categoryId, $productId=null)
    {
        $category=Category::where('id',$categoryId)->first();
        $selectedAttributeValues=[];
        if($productId){
            $selectedAttributeValues=AttributeValueProduct::where('product_id',$productId)->pluck('attribute_value_id');
        }
//        dd($selectedAttributeValues->toArray());
//        dd($selectedAttributeValues);
        $attributes=$category->load(['attributes.translations','attributes.values.translations'])->attributes;
//        dd($attributes);
        return view('admin.attribute.product-attributes',compact('attributes','selectedAttributeValues'))->render();
    }
}
