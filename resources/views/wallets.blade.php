@extends('layouts.main')

@section('title')
    wallets
@endsection

@section('css')
<link rel="stylesheet" href="/css/wallets.css">
@endsection

@section('content')

    @forelse($wallets as $wallet)
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

        <!-- Pagiation names -->
        {{ $wallet->name }}       
    @empty
        <p class="alert alert-danger">You have no Wallet yet :(</p>
    @endforelse
    <!-- Pagination Link -->
    {{ $wallets->links() }}         

@endsection
