<?php

namespace App\Http\Requests\Admin\Usersbuy;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'useremail' => 'required',
            'userphone' => 'required|regex:/(0)[0-9]{9}/|min:10|max:10',                
        ];
    }

    public function messages(){
        return [            
            'useremail.required' => 'Vui lòng nhập mật khẩu.',           

            'userphone.required' => 'Vui lòng nhập số điện thoại.',            
            'userphone.regex' => 'Vui lòng nhập đúng định dạng số và 0xxxxxxxxx',
            'userphone.min' => 'Vui lòng nhập số điện thoại tối thiểu là 10.',
            'userphone.max' => 'Vui lòng nhập số điện thoại tối đa là 10.',
        ];
    }
}