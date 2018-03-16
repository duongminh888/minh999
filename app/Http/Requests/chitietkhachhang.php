<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class chitietkhachhang extends FormRequest
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
            'hoten' => 'required', 
            'cmt' => 'required',
            'sotienvay' => 'required',
            'songay' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'hoten.required'=>'Vui lòng nhập họ tên của bạn.',
            'cmt.required'=>'Vui lòng nhập số chứng minh thư.',
            'sotienvay.required'=>'Vui lòng nhập Số tiền',
            'songay.required'=>'Vui lòng nhập Số ngày vay'
        ];
    }
}
