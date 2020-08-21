@extends('app')

@section('title', '家族招待')

@section('content')
    @include('familynav')
    <form method="POST" action="{{ route('invitation.create') }}">
        @csrf
        <div class="form-group">
            <label class="control-label">Email</label>
            <input class="form-control" type="text" name="email" required value="{{ old('email') }}">
        </div>
        <button type="submit" class="btn blue-gradient btn-block">招待する</button>
    </form>
@endsection
