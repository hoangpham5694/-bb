<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ChangePassRequest extends Request
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
            'txtOldPass' => 'required',
            'txtNewPass' => 'required|min:6',
            'txtReNewPass' => 'required|min:6|same:txtNewPass'
        ];
    }
    public function messages()
    {
    return [
        'txtOldPass.required' => 'Vui lòng nhập mật khẩu cũ',
        'txtNewPass.required'  => 'Vui lòng nhập mật khẩu mới',
        'txtReNewPass.required'  => 'Vui lòng nhập lại mật khẩu mới',
        'txtNewPass.min'  => 'Mật khẩu phải trên 6 kí tự',
        'txtReNewPass.min'  => 'Mật khẩu phải trên 6 kí tự',
        'txtReNewPass.same'  => 'Mật khẩu mới phải trùng nhau',
    ];
    }

}
