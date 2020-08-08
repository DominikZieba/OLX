<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;

class StoreData extends FormRequest
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
        $user = User::find(auth()->user()->id);

        return [
            'nick' => 'required', 'string', 'min:4', 'max:30','unique:users,'.$user->id,
            'name' => 'required', 'string', 'min:2', 'max:30',
            'surname' => 'required', 'string', 'min:2', 'max:30',
            'phone' => 'required', 'numeric', 'digits:9','unique:users,'.$user->id
        ];
    }
}
