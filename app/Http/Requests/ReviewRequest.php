<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'product_id'=>'required|exists:products,id',
            'fullname'=>'required|min:2|max:50',
            'comment'=>'required|max:255',
            'email'=>'required|email',
            'rating'=>'required|numeric|min:0'
        ];
    }
}
