@extends('layouts.main')

@section('title')
    register
@endsection

@section('content')
<div>
    <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>
</div>

<form method="POST" action="{{ route('password.email') }}">
    @csrf

    <!-- Email Address -->
    <div>
        <label for="email" class="form-label">Email</label>
        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
    </div>

    <div class="flex items-center justify-end mt-4">
        <button class="btn btn-primary"> 
            Email Password Reset Link
        </button>
    </div>
    <!-- Error show -->
    <br>
    @if(isset($Error))
        <p style="color: red">{{ $Error }}</p>
    @endif
</form>
@endsection