<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'price' => ['required', 'numeric', 'min:0'],
            'image' => ['image', 'mimes:jpg,jpeg,png', 'max:2048'],
            'expired_at' => ['required', 'date:Y-m-d H:i', 'after:yesterday'],
        ];
    }

    public function attributes()
    {
        return [
            'name' => '商品名',
            'price' => '値段',
            'image' => '画像',
            'expired_at' => '消費期限',
        ];
    }
}
