@extends('layouts.main')

@section('title')
    register
@endsection

@section('content')
<form method="POST" action="{{ route('register') }}">
    @csrf

    <!-- Name -->
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input id="name" class="form-control" type="text" name="name" :value="old('name')" required autofocus />
    </div>

    <!-- Email Address -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input id="email" class="form-control" type="email" name="email" :value="old('email')" required />
    </div>

    <!-- Password -->
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input id="password" class="form-control" type="password" name="password" required autocomplete="new-password" />
    </div>

    <!-- Confirm Password -->
    <div class="mb-3">
        <label for="password_confirmation" class="form-label">Confirm Password</label>
        <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required />
    </div>
    
    <a href="{{ route('login') }}">
        Already registered?
    </a>
    <br> <br>
    <div class="mb-3">
        <button class="btn btn-primary">
            Register
        </button>
    </div>
</form>
@endsection