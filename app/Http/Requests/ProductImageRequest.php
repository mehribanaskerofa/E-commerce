<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductImageRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'image'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'required','image','mimes:jpg,jpeg,png'],
            'active'=>'nullable|boolean',
            'product_id'=>'required|exists:products,id'
        ];
        return $this->mapLanguageValidations($data);
    }

}
