<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAdvert extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required', 'string', 'min:2','max:256',
            'category_id' => 'required',
            'price' => 'required','numeric','between:0,100000000000',
            'description' => 'required','string','min:30','max:1000',
            'photo_name1' => 'required'
        ];
    }
}
