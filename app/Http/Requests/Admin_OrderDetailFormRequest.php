<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_OrderDetailFormRequest extends FormRequest
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
            'order_id' => 'required|bail',
            'product_id' => 'required|bail',
            'quantities' => 'required|bail|min:1',
            'required_date' => 'required|bail',
            'shipped_date' => 'required|bail',
            'status' => 'required',
        ];
    }
}
