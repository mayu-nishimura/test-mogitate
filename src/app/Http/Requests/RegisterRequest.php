<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' =>  ['required', 'string', 'max:255'],
            'price' => ['required', 'integer', 'min:0', 'max:10000'],
            'image' => ['required', 'file', 'mimes:png,jpeg'],
            'season' => ['required', 'array'],
            'season.*' => ['string'],
            'description' => ['required', 'string', 'max:120'],
        ];
    }

    public function messages()
    {
        return [
            'name.required' => '商品名を入力してください',
            'price.required' => '値段を入力してください',
            'price.integer' => '数値で入力してください',
            'price.min' => '0~10000円以内で入力してください',
            'price.max' => '0~10000円以内で入力してください',
            'image.required' => '商品画像を登録してください。',
            'image.mimes' => '「.png」または「.jpeg」形式でアップロードしてください',
            'season.required' => '季節を選択してください',
            'description.required' => '商品の説明を入力してください',
            'description.max' => '120文字以内で入力してください',
        ];
    }
    
}
