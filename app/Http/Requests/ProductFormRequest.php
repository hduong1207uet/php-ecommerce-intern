<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductFormRequest extends FormRequest
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
            'name' => 'required|bail|min:2|max:255',
            'price' => 'required|bail|gt:0',
            'supplier' => 'required|bail|min:2|max:255',
            'category_id' => 'required|bail|',
            'description' => 'max:1024|min:0',
        ];
    }
}
