<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'unique:categories|string'
        ];
    }

    public function messages()
    {
       return [
           'title.unique' => 'কিরে! এক জিনিস বার বার দেস ক্যা? বেদ্দপ'
       ];
    }
}
