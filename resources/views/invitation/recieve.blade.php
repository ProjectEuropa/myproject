@extends('app')

@section('title', '招待を受ける')

@section('content')
@include('familynav')
<form method="POST" action="{{ route('invitation.register') }}">
    @csrf
    <div class="md-form">
        <input class="form-control" type="hidden" id="token" name="token" required value="{{ $token }}">
        <label for="name">ユーザー名</label>
        <input class="form-control" type="text" id="name" name="name" required value="{{ old('name') }}">
        <small>自分のお名前をお入れください</small>
    </div>
    <div class="md-form">
        <label for="email">メールアドレス</label>
        <input class="form-control" type="text" id="email" name="email" required value="{{ old('email') }}">
    </div>
    <div class="md-form">
        <label for="password">パスワード</label>
        <input class="form-control" type="password" id="password" name="password" required>
    </div>
    <button type="submit" class="btn blue-gradient btn-block">招待を受ける</button>
</form>
@endsection
