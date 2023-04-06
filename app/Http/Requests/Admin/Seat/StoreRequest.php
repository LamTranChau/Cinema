<?php

namespace App\Http\Requests\Admin\Seat;

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
            'seatname' => 'required',
            'cate_seat' => 'required',
            'seatprice' => 'required',
            'room_id' => 'required'
        ];
    }

    public function messages(){
        return [
            'seatname.required' => 'Vui lòng nhập tên ghế.',
            'cate_seat.required' => 'Vui lòng nhập tên hàng ghế.',
            'seatprice.required' => 'Vui lòng nhập giá tiền.',
            'room_id.required' => 'Vui lòng nhập tên phòng.',            
        ];
    }
}
