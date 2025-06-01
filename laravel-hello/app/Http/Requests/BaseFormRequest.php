<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

abstract class BaseFormRequest extends FormRequest
{
    public function messages(): array
    {
        return [
            'required' => ':attribute は必須です。',
            'string' => ':attribute は文字列で入力してください。',
            'max' => ':attribute は :max 文字以内で入力してください。',
            'email' => ':attribute の形式が正しくありません。',
            // 他にも共通なパターン
        ];
    }
}
