<?php

namespace App\Http\Requests\Admin\User;

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
            'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            'password_confirmation' => 'min:6',
            'full_name' => 'required',
            'email' => 'required|unique:users,email,'. $this->route('id'),
            'phone' => 'required|unique:users,phone|regex:/(0)[0-9]{9}/|min:10|max:10' . $this->route('id'),          
        ];
    }

    public function messages(){
        return [
            'password.min' => 'Vui lòng nhập mật khẩu tối thiểu 6 ký tự.',
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.same' => 'Xác nhập mật khẩu không trùng khớp.',

            'password_confirmation.min' => 'Vui lòng nhập mật khẩu xác nhận tối thiểu 6 ký tự.',            

            'full_name.required' => 'Vui lòng nhập họ tên.',
            
            'email.required' => 'Vui lòng nhập email.',
            'email.unique' => 'Vui lòng không nhập trùng email.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.unique' => 'Vui lòng không nhập trùng số điện thoại.',
            'phone.regex' => 'Vui lòng nhập đúng định dạng số và 0xxxxxxxxx',
            'phone.min' => 'Vui lòng nhập số điện thoại tối thiểu là 10.',
            'phone.max' => 'Vui lòng nhập số điện thoại tối đa là 10.',
        ];
    }
}

// 'phone' => 'required|regex:/(01)[0-9]{9}/'


// Validator::extend('phone_number', function($attribute, $value, $parameters)
// {
//     return substr($value, 0, 2) == '01';
// });


// 'phone' => 'required|numeric|phone_number|size:11'

//pattern="[0]{1}[0-9]{2}-[0-9]{3}-[0-9]{4}"
