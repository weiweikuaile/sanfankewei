<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class GoodsPostRequest extends Request
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
            'title' => 'required',
            'num' => 'required|regex:/\d{1,5}/',
            'price' => 'required|regex:/\d{1,5}/',
            'content' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'title.required' => '商品名称不能为空',
            'num.required' => '商品库存不能为空',
            'num.regex' => '商品库存长度为1到5位数字',
            'price.required' => '商品单价不能为空',
            'price.regex' => '商品单价长度为1到5位数字',
            'content.required' => '商品详情不能为空',
        ];
    }
}
