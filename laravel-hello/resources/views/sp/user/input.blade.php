@extends('layouts.app')

@section('title', 'ユーザー入力')

@section('content')
    <h1>ユーザー情報入力</h1>
    <form method="POST" action="/user/confirm">
        @csrf
        <div class="mb-3">
            <label class="form-label">名前SP</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}">
            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">電話番号SP</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
            @error('phone') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">住所SP</label>
            <input type="text" name="address" class="form-control" value="{{ old('address') }}">
            @error('address') <div class="text-danger">{{ $message }}</div> @enderror
        </div>
        <button type="submit" class="btn btn-primary">確認</button>
    </form>
@endsection
