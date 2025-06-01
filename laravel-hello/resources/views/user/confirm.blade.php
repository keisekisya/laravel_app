@extends('layouts.app')

@section('title', '確認画面')

@section('content')
    <h1>入力内容確認</h1>
    <dl class="row">
        <dt class="col-sm-3">名前</dt>
        <dd class="col-sm-9">{{ $input['name'] }}</dd>

        <dt class="col-sm-3">電話番号</dt>
        <dd class="col-sm-9">{{ $input['phone'] }}</dd>

        <dt class="col-sm-3">住所</dt>
        <dd class="col-sm-9">{{ $input['address'] }}</dd>
    </dl>

    <form method="POST" action="/user/store">
        @csrf
        <button type="submit" class="btn btn-success">保存</button>
        <a href="/user/input" class="btn btn-secondary">戻る</a>
    </form>
@endsection
