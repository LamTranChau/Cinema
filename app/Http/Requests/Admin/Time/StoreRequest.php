<?php

namespace App\Http\Requests\Admin\Time;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the time is authorized to make this request.
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
            'time_slot' => 'required|regex:/[0-2]{1}[0-9]{1}(:)[0-6]{1}[0-9]{1}/|min:5|max:5',
            'timeprice' => 'required',
            'special_day' => 'required'
        ];
    }

    public function messages(){
        return [
            'time_slot.required' => 'Vui lòng nhập khung thời gian.',
            'time_slot.regex' => 'Vui lòng nhập đúng định dạng khung thời gian với hh:mm (24:60)',
            'time_slot.min' => 'Vui lòng nhập khung thời gian tối thiểu 5 ký tự.',
            'time_slot.max' => 'Vui lòng nhập khung thời gian tối đa 5 ký tự.',
            'timeprice.required' => 'Vui lòng nhập giá tiền.',
            'special_day.required' => 'Vui lòng chọn ngày.'
        ];
    }
}
