<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the Brand is authorized to make this request.
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'brandname' => 'required|unique:brand,brandname,'. $this->route('id'),
            'address' => 'required|unique:brand,address,'. $this->route('id'),
        ];
    }

    public function messages(){
        return [
            'brandname.required' => 'Vui lòng nhập tên chi nhánh.',
            'brandname.unique' => 'Vui lòng không nhập trùng tên chi nhánh.',
            'address.required' => 'Vui lòng nhập tên địa chỉ chi nhánh.',            
            'address.unique' => 'Vui lòng không nhập trùng địa chỉ.'
        ];
    }
}
