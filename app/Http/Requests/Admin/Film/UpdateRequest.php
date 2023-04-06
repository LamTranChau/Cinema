<?php

namespace App\Http\Requests\Admin\Film;

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
            'filmname' => 'required',
            'trailer' => 'required',
            'start_day' => 'required',
            'castes' => 'required',
            'time_film' => 'required',
        ];
    }

    public function messages(){
        return [
            'filmname.required' => 'Vui lòng nhập tên phim.',
            'trailer.required' => 'Vui lòng nhập trailer.',
            'trailer.unique' => 'Vui lòng nhập không trùng trailer.',
            'start_day.required' => 'Vui lòng nhập ngày khởi chiếu.',
            'castes.required' => 'Vui lòng nhập tên các diễn viên.',
            'time_film.required' => 'Vui lòng nhập thời lượng phim.'
        ];
    }
}
