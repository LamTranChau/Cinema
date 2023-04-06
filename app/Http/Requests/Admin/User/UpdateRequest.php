<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'password' => 'required_with:password_confirmation|same:password_confirmation',
            'full_name' => 'required',
            'email' => 'required|unique:users,email,'. $this->route('id'),
            'phone' => 'required|unique:users,phone,'. $this->route('id')
        ];
    }

    public function messages(){
        return [
            'password.required' => 'Vui lòng nhập mật khẩu.',
            'password.same' => 'Xác nhập mật khẩu không trùng khớp.',

            'password_confirmation.min' => 'Vui lòng nhập mật khẩu xác nhận tối thiểu 6 ký tự.',

            'full_name.required' => 'Vui lòng nhập họ tên.',
            
            'email.required' => 'Vui lòng nhập email.',
            'email.unique' => 'Vui lòng không nhập trùng email.',

            'phone.required' => 'Vui lòng nhập số điện thoại.',
            'phone.unique' => 'Vui lòng không nhập trùng số điện thoại.'
        ];
    }
}
