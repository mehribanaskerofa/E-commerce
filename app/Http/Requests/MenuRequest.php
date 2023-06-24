<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{


    public function rules(): array
    {
        $data= [
            'url'=>'required|url',
            'active'=>'nullable|boolean',
            'date'=>'nullable|date',
            'parent_id'=>'nullable|numeric|exists:menu,id'
        ];
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data){
        foreach (config('app.languages') as $lang) {
            $data[$lang] = 'required|array';
            $data["$lang.title"] = 'required|string|min:2';
        }
        return $data;
}}
