<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
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

            'name'               => 'required|max:255|string',
            'email'              => 'required|max:255|string|email',
            'address'            => 'max:255|string|nullable',
            'password'           => 'required|max:20|string|min:6',
        ];
    }
    public function messages()
    {
        return [
            'name.required'        => '名前は必須入力です',
            'name.max'             => '名前は255文字以内で入力して下さい',
            'name.string'          => '名前は文字で入力して下さい',
            'email.required'       => 'emailは必須入力です',
            'email.max'            => 'emailは255文字以内で入力して下さい',
            'email.string'         => 'emailは文字で入力して下さい',
            'email.email'          => 'email形式で入力して下さい',
            'address.max'          => '住所は255文字以内で入力して下さい',
            'address.string'       => '住所は文字で入力して下さい',
            'password.required'    => 'パスワードは必須入力です',
            'password.max'         => 'パスワードは20文字以内で入力して下さい',
            'password.min'         => 'パスワードは6文字以上で入力して下さい',
            'password.string'      => 'パスワードは文字で入力して下さい',
        ];
    }
}
