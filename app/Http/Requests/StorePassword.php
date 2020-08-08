<?php

namespace App\Http\Requests;

use App\Rules\MatchOldPassword;
use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StorePassword extends FormRequest
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
            'old_password' => ['required', 'string', 'min:8','max:30', new MatchOldPassword()],
            'new_password' => ['required', 'string', 'min:8','max:30'],
            'new_password_confirm' => ['same:new_password']
        ];
    }
}
