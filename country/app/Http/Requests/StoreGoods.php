<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGoods extends FormRequest
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
            'gname' => 'required',
            'price' => 'required|numeric|regex:/^\d{1,6}(\.\d*)?$/',
            'stock' => 'required|numeric',
            'images' => 'required',
            'content' => 'required',
            'sales' => 'required',
           
            
        ];
    }
    public function messages() 
    {
        return [
            'gname.required' => '商品名不能为空!',
            'price.required' => '价格不能为空!',
            'stock.required' => '商品库存不能为空!',
            'images.required' => '主图不能为空!',
            'content.required' => '商品描述不能为空!',
            'price.numeric' => '请输入数字',
            'stock.numeric' => '请输入数字',
            'price.regex' => '请输入不大于6位数金额',
            'sales.required' => '销量不能为空',
        ];
    }
}
