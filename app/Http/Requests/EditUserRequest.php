<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class EditUserRequest extends Request
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
            'txtUsername' => 'required|min:3',
            'txtName' => 'required|min:3',
            'txtPass' => 'min:6|same:txtRepass',
            'txtRepass' => 'same:txtPass'
        ];

    }
     public function messages()
    {
    return [
        'txtUsername.required' => 'Vui lòng nhập tên đăng nhập',
        'txtName.required'  => 'Vui lòng nhập tên',
        'txtUsername.min'  => 'Tên đăng nhập phải trên 3 kí tự',
        'txtName.min'  => 'Tên phải trên 3 kí tự',
        'txtPass.min'  => 'Mật khẩu phải trên 6 kí tự',
        'txtRepass.same'  => 'Mật khẩu phải trùng nhau',
        'txtPass.same'=> 'Mật khẩu phải trùng nhau',
        'txtUsername.unique' => 'Tên đăng nhập đã tồn tại'
    ];
    }
}
