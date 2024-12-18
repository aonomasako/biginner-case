<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
            'name' => ['required','string','max:191'],
            'email' => ['required','string','max:191','unique'],
            'password' => ['required','min:8','max:191','confirmed']
        ];
    }
    
    public function messages()
    {
        return [
            'name.required' => '名前を入力してください',
            'name.string' => '名前を文字列で入力してください',
            'name.max' => '名前を191文字以下で入力してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.string' => 'メールアドレスを文字以下で入力してください',
            'email.max' => 'メールアドレスを191文字以下で入力してください',
            'email.unique' => 'メールアドレスの重複不可',
            'password.required' => 'パスワードを入力してください',
            'password.min' => 'パスワードは8文字以上入力してください',
            'password.max' => 'パスワードは191文字以下で入力してください',
            'password.confirmed' => 'パスワードをもう一度入力してください'
        ];
    }

}
