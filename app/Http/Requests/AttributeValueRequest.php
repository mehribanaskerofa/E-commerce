<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AttributeValueRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'active'=>'nullable|boolean',
            'attribute_id'=>'required|exists:attributes,id',
            'value'=>'required|string|min:1'
        ];
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data){
        foreach (config('app.languages') as $lang){
            $data[$lang]='required|array';
            $data["$lang.title"]='required|string|min:1';
        }
        return $data;
    }
}
