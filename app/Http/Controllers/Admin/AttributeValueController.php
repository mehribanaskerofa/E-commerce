<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeValueRequest;
use App\Models\AttributeValue;
use App\Services\RepositoryService\AttributeValueService;

class AttributeValueController extends Controller
{

    public function __construct(protected AttributeValueService $attributeValueService)
    {

    }

    public function index($attributeId)
    {
        $models=$this->attributeValueService->dataAll($attributeId);
        return view('admin.attribute-value.index',compact('models','attributeId'));
    }
    public function create($attributeId)
    {
        return view('admin.attribute-value.form',compact('attributeId'));
    }
    public function store(AttributeValueRequest $request)
    {
        $this->attributeValueService->store($request);
        return redirect()->route('admin.attribute-value.index',$request->attribute_id);
    }
    public function edit(AttributeValue $attribute)
    {
        dd($attribute->toArray());
//        dd(AttributeValue::where('id',2)->get());
        return view('admin.attribute-value.form',['model'=>$attribute]);
    }
    public function update(AttributeValueRequest $attributeValueRequest, AttributeValue $attributeValue)
    {
        dd($attributeValueRequest->toArray());
        $this->attributeValueService->update($attributeValueRequest,$attributeValue);
        return redirect()->back();
    }
    public function destroy(AttributeValue $attributeValue)
    {
        $this->attributeValueService->delete($attributeValue);
        return redirect()->back();
    }

}
