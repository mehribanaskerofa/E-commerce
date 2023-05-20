<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
{
    public function rules(): array
    {
        $data= [
            'image'=>[Rule::requiredIf(request()->method==self::METHOD_POST),'required','image','mimes:jpg,jpeg,png'],
            'active'=>'nullable|boolean',
            'parent_id'=>'nullable|exists:categories,id'
        ];
//        dd($this->mapLanguageValidations($data));
        return $this->mapLanguageValidations($data);
    }
    private function mapLanguageValidations($data){
        foreach (config('app.languages') as $lang){
            $data[$lang]='required|array';
            $data["$lang.title"]='required|string|min:2';
            $data["$lang.slug"]=[
                'required','string',
                Rule::unique('category_translations','slug')
                    ->where('locale',$lang)
                    ->ignore($this->route('category')?->id,'category_id')];
        }
        return $data;
    }
}
