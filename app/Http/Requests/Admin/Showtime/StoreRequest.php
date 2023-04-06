<?php

namespace App\Http\Requests\Admin\Showtime;

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
            'film_id' => 'required|numeric',
            'brand_id' => 'required|numeric',	
            'room_id' => 'required|numeric',               
            'date_time' => 'required',	
            'time_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'film_id.required' => 'Vui lòng chọn phim.',
            'film_id.numeric' =>  'Vui lòng chọn phim.',
            
            'brand_id.required' => 'Vui lòng chọn chi nhánh.',
            'brand_id.numeric' => 'Vui lòng chọn chi nhánh.',

            'room_id.required' => 'Vui lòng chọn phòng chiếu.',
            'room_id.numeric' => 'Vui lòng chọn phòng chiếu.',

            'date_time.required' => 'Vui lòng chọn ngày tháng.',

            'time_id.required' => 'Vui lòng chọn khung thời gian.',
                       
        ];
    }
}
