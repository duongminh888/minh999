<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class checkvaymoi extends FormRequest
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
            //
            'hoten' => 'required|string', 
            'cmt' => 'required|string',
            'sdt' => 'required|string',
            'sotien' => 'required|string',
            'songayvay' => 'required|string',
        ];
    }
    public function messages()
    {
        return [
            'hoten.required'=>'Vui lòng nhập họ tên của bạn.',
            'cmt.required'=>'Vui lòng nhập số chứng minh thư.',
            'sdt.required'=>'Vui lòng nhập Số điện thoại',
            'sotien.required'=>'Vui lòng nhập Số tiền',
            'songayvay.required'=>'Vui lòng nhập Số ngày vay'
        ];
    }
}
