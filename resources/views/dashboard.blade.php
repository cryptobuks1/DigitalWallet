@extends('layouts.main')

@section('title')
    dashboard
@endsection

@section('content')
    <h2>New Wallet</h2>
    <form action="{{ route('newWallet') }}" method="post">
        @csrf

        <fieldset>
            <!-- Wallet Name -->
            <div class="mb-3">
                <label for="nameId" class="form-label">Wallet Name</label>
                <input name="walletsName" type="text" id="nameId" class="form-control" placeholder="wallet name" required>
            </div>

            <!-- Cash -->
            <div class="mb-3">
                <label for="cashId" class="form-label">Cash type</label>
                <select name="cash" id="cashId" class="form-select">
                    <option>Euro</option>
                    <option>Doller</option>
                    <option>Toman</option>
                </select>
            </div>

            <!-- Credit Card -->
            <div class="mb-3">
                <label for="creditId" class="form-label">Credit Card</label>
                <select name="creditCard" id="creditId" class="form-select">
                    <option>Pey_Pal</option>
                    <option>Visa</option>
                    <option>American Express</option>
                    <option>Capitial One</option>
                </select>
            </div>

            <!-- submit -->
            <button class="btn btn-primary">Add</button>
            <br> <br>
            
            @if (Session::get("success"))
                <p class="alert alert-success">{{ Session::get("success") }}</p>
            @endif
        </fieldset>
    </form>
@endsection