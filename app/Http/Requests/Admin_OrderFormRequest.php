<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Admin_OrderFormRequest extends FormRequest
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
            'user_id' => 'required|bail',
            'status' => 'required|bail',
            'ordered_date' => 'required|bail',
            'address' => 'required|bail|min:5|max:1024',
            'phone_number' => 'required|bail|min:10|max:11',
            'description' => 'max:1024',
        ];
    }
}
