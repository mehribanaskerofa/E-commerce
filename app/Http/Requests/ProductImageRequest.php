<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductImageRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'image'=>['required','image','mimes:jpg,jpeg,png'],
            'product_id'=>'required|exists:products,id',
            'sort_order'=>'nullable|numeric'
        ];
    }

}
