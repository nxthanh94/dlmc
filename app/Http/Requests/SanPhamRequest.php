<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SanPhamRequest extends FormRequest
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
            'gia' => 'required|numeric',
            'soluong' => 'required|numeric',
            'name' => 'required|min:4',
            'mota' => 'required',
            
        ];
    }

    public function messages()
    {
        return [
        'name.required' => 'Vui lòng nhập tên sản phảm',
        'name.min' => 'Tên sản phảm tối thiểu 4 kí tự ',
        ////////////////////////////////////////////////
        'gia.required' => 'Vui lòng nhập giá ',
        'gia.numeric' => 'Vui lòng nhập số',

        'soluong.required' => 'Vui lòng nhập số lượng ',
        'soluong.numeric' => 'Vui lòng nhập số ',
        'mota.required' => 'Không được để trống ô này ',


        
        ];
    }
}
