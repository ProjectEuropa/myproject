@extends('app')

@section('title', '家族招待')

@section('content')
    @include('familynav')
    <div class="form-group">
        <label class="control-label">Email</label>
        {{ $email }}を招待しました。
    </div>
    <div class="form-group">
        招待用のURLは <br>
        {{ route('invitation.recieve', ['token' => $token]) }} <br>
        です。
    </div>
@endsection
