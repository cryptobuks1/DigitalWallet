@extends('layouts.main')

@section('title')
    Balence Details
@endsection


@section('content')
@if(isset($balances))
    <table class="table table-dark" style="border-radius: 8px;">
    <thead>
        <tr>
            <th scope="col">Balance</th>
            <th scope="col">Total</th>
            <th scope="col">Date</th>
        </tr>
    </thead>
    <tbody>
    
    @foreach($balances as $balance)
        <tr>
            <td>{{ $balance['balance'] }}</td>
            <td>{{ $balance['total'] }}</td>
            <td>{{ $balance['created_at'] }}</td>
        </tr>
    @endforeach

    </tbody>
    </table>
@endif
@endsection
