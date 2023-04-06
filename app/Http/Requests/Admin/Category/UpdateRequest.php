<?php

namespace App\Http\Requests\Admin\Category;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the category is authorized to make this request.
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
            'categoryname' => 'required|unique:category,categoryname,'. $this->route('id'),
            'parent_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'categoryname.required' => 'Vui lòng nhập thể loại.',
            'categoryname.unique' => 'Vui lòng không nhập trùng thể loại.',
            'parent_id.required' => 'Vui lòng nhập parent_id.',
        ];
    }
}
