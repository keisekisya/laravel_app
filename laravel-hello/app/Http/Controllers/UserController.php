<?php

namespace App\Http\Controllers;

use App\Models\UserInfo;
use App\Http\Requests\StoreUserRequest;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function showInputForm()
    {
        return view('user.input');
    }

    public function confirmInput(StoreUserRequest $request)
    {
        // バリデーション済みのデータ
        $validated = $request->validated();

        Session::put('user_input', $validated);

        return view('user.confirm', ['input' => $validated]);
    }

    public function store(Request $request)
    {
        $input = Session::get('user_input');

        if (!$input) {
            return redirect('/user/input')->with('error', 'セッションが切れました。');
        }

        // 再バリデーション（requestオブジェクトに渡して再利用）
        #$request->merge($input);
        #$validated = $request->validated();
        // StoreUserRequestのrulesとattributesを使ってValidatorを作成
        $storeRequest = new StoreUserRequest();
        $validator = Validator::make($input, $storeRequest->rules(), [], $storeRequest->attributes());
        // バリデーション失敗時は例外を投げる（通常のFormRequestと同じ動き）
        if ($validator->fails()) {
            throw new ValidationException($validator);
        }


        UserInfo::create($input);
        Session::forget('user_input');

        return redirect('/user/complete');
    }

    public function complete()
    {
        return view('user.complete');
    }
}
