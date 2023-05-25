<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AttributeRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'active'=>'nullable|boolean'
        ];
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data){
        foreach (config('app.languages') as $lang){
            $data[$lang]='required|array';
            $data["$lang.title"]='required|string|min:2';
        }
        return $data;
    }
}
