@extends('layouts.main')

@section('title')
    wallets
@endsection


@section('content')
    @if(isset($wallets) and !empty($wallets))
        @foreach($wallets as $wallet)
            <a href="/walletBalence/{{ $wallet['id'] }}">
                <div style="background: #0077b6; color: #f6f6f6; border: 1px solid #03045e; border-radius: 30px; margin-bottom: 20px; padding: 30px">
                    <h3>Wallet Name: {{ $wallet['wallet_name'] }}</h3>
                    <br>
                    <h6>created at: {{ $wallet['created_at'] }}</h6>
                </div>
            </a>
        @endforeach
    @else
        <p style="color:red;">You have no Wallet yet :(</p>
    @endif
@endsection
