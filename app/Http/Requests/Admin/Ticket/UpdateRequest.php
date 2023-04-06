<?php

namespace App\Http\Requests\Admin\Ticket;

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
            'price' => 'required',
            'seat_id' => 'required',
            'showtime_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'price.required' => 'Vui lòng nhập giá.',
            'seat_id.required' => 'Vui lòng nhập ghế.',
            'showtime_id.required' => 'Vui lòng nhập vé.'
        ];
    }
}
