<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AddAppRequest extends Request
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
            'txtTitle' => 'required',
            'txtUrl' => 'required'
        ];
    }
    public function messages()
    {
    return [
        'txtTitle.required' => 'Vui lòng nhập title',
        'txtUrl.required'  => 'Vui lòng nhập đường dẫn',
    ];
    }

}
