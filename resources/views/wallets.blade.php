@extends('layouts.main')

@section('title')
    wallets
@endsection

@section('css')
<link rel="stylesheet" href="css/wallets.css">
@endsection

@section('content')
    @if(isset($wallets) and !empty($wallets))
        @foreach($wallets as $wallet)
            
                <div class="cards">
                    <h3>Wallet Name: {{ $wallet['wallet_name'] }}</h3>
                    <br>
                    <h5>Total balence: {{ $wallet['total'] }}</h6>
                    <br>
                    <h6>created at: {{ $wallet['created_at'] }}</h6>
                    <br>
                    <a href="/addBalenceGet/{{ $wallet['id'] }}" class="btn btn-light">Add balence</a>
                    <a href="/balenceDetails/{{ $wallet['id'] }}" style="margin-left:10px" class="btn btn-success">Details</a>
                    <a href="/deleteWallet/{{ $wallet['id'] }}" style="margin-left:10px" class="btn btn-danger">Delete</a>
                </div>
            
        @endforeach
    @else
        <p class="failed">You have no Wallet yet :(</p>
    @endif
@endsection
