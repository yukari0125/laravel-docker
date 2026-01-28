<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

   public function rules(): array
{
    return [
        'name'        => ['required', 'string', 'max:255'],
        'price'       => ['required', 'integer', 'min:0', 'max:10000'],
        'image'       => ['required', 'image', 'mimes:jpeg,png', 'max:2048'],

        'season'      => ['required', 'array', 'min:1'],
        'season.*'    => ['in:春,夏,秋,冬'],

        'description' => ['required', 'string', 'max:120'],
    ];
}


    public function attributes(): array
    {
        return [
            'name'        => '商品名',
            'price'       => '値段',
            'image'       => '商品画像',
            'season'      => '季節',
            'description' => '商品説明',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'        => '商品名を入力してください',
            'price.required'       => '値段を入力してください',
            'price.integer'        => '値段は数値で入力してください',
            'price.min'            => '0〜10000円以内で入力してください',
            'price.max'            => '0〜10000円以内で入力してください',
            'image.required'       => '商品画像を選択してください',
            'image.image'          => '画像ファイルをアップロードしてください',
            'image.mimes'          => '.jpg, .jpeg, .png 形式の画像をアップロードしてください',
            'season.required'      => '季節を選択してください',
            'season.in'            => '季節は 春・夏・秋・冬 から選択してください',
            'description.required' => '商品説明を入力してください',
            'description.max'      => '商品説明は120文字以内で入力してください',
        ];
    }
}