@extends('layouts.main')

@section('title')
    login
@endsection

@section('content')
<form method="POST" action="{{ route('login') }}">
    @csrf

    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required autofocus />
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" class="form-control" type="password" name="password" required autocomplete="current-password" />
    </div>

    <!-- button -->
    <div class="mb-3">
        <button class="btn btn-primary">
            Log in
        </button>
        <br> <br>
        @if (Route::has('password.request'))
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                Forgot your password
            </a>
        @endif
    </div>
</form>
@endsection