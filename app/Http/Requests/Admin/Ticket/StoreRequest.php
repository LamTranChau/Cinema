<?php

namespace App\Http\Requests\Admin\Ticket;

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
            "film_id" => "required",
            "brand_id" => "required",
            "date_time" => "required",
            "time_id" => "required",
            'seats' => 'required'
        ];
    }

    public function messages(){
        return [
            "film_id" => "Vui lòng chọn tên phim",
            "brand_id" => "Vui lòng chọn chi nhánh",
            "date_time" => "Vui lòng chọn ngày xem",
            "time_id" => "Vui lòng chọn suất chiếu",
            'seats' => 'Vui lòng chọn ghế'
        ];
    }
}
