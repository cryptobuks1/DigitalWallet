@extends('layouts.main')

@section('title')
    Balence Details
@endsection


@section('content')

@if(isset($balances) and !empty($balances))
        <table class="table table-dark" style="border-radius: 8px;">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Balance</th>
                <th scope="col">Total</th>
                <th scope="col">Date</th>
            </tr>
        </thead>
        <tbody>
        
        @foreach($balances as $balance)
            <tr>
                <th scope="row"></th>
                <td>{{ $balance['balance'] }}</td>
                <td>{{ $balance['total'] }}</td>
                <td>{{ $balance['created_at'] }}</td>
            </tr>
        @endforeach

        </tbody>
        </table>
@else
    <p style="color: red">Your wallet is Empty.</p>
@endif
@endsection
