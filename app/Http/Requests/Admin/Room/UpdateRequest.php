<?php

namespace App\Http\Requests\Admin\Room;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the brand is authorized to make this request.
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
            'roomname' => 'required|regex:/(R)[0-9]{2}/|max:3',
            'brand_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'roomname.required' => 'Vui lòng nhập tên phòng.',
            'roomname.regex' => 'Vui lòng nhập đúng định dạng phòng: Rxx. Với mỗi x là số',
            'roomname.max' => 'Nhập tối đa 3 ký tự.',
            'brand_id.required' => 'Vui lòng nhập địa chỉ.'
        ];
    }
}
