<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class TranslationRequest extends FormRequest
{
    public function rules(): array
    {
        $validations= [
            'key'=>['required', Rule::unique('translation','key')->ignore($this->route('translation')?->id)],
            'value'=>'required|array',
            'value.az'=>'required|string'
        ];
        return $this->validateTranslationValue($validations);
    }

    public function validateTranslationValue($validations)
    {
        foreach (config('app.languages') as $lang){
            $validations["value.$lang"]='required|string|min:2';
        }
        return $validations;
    }
}
