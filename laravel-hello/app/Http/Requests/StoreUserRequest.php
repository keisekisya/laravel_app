<?php

namespace App\Http\Requests;

class StoreUserRequest extends BaseFormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20'],
            'address' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'name' => '名前',
            'phone' => '電話番号',
            'address' => '住所',
        ];
    }
}
