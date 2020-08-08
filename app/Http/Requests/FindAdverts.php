<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FindAdverts extends FormRequest
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
            'price_min' => ['nullable','numeric','min:0'],
            'price_max' => ['nullable','numeric','max:100000000000','gt:price_min']
        ];
    }
}
