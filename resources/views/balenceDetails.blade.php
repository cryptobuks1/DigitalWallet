@extends('layouts.main')

@section('title')
    Balence Details
@endsection

@section('css')
<link rel="stylesheet" href="/css/wallets.css">
@endsection

@section('content')
    <table class="table table-dark" style="border-radius: 8px;">
        <thead>
            <tr>
                <th scope="col">Balance</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
    @forelse($balances as $balance)    
        <tbody>
            <tr>
                <td>{{ $balance['balance'] }}</td>
                <td>{{ $balance['total'] }}</td>
                <td>{{ $balance['created_at'] }}</td>
            </tr>
        
        </tbody>
    @empty
        <p class="failed">Balence is Empty</p>
    @endforelse

    </table>
@endsection
