<?php

namespace App\Http\Requests\Admin\CategoryFilm;

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
            'price' => 'required',
            'category_id' => 'required',
            'film_id' => 'required',
        ];
    }

    public function messages(){
        return [
            'price.required' => 'Vui lòng nhập giá.',
            'category_id.required' => 'Vui lòng nhập thể loại.',
            'film_id.required' => 'Vui lòng nhập phim.'
        ];
    }
}
