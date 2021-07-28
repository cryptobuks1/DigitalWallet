@extends('layouts.main')

@section('title')
    Add Balence
@endsection

@section('content')
<h2>Add your balence</h2>
<form action="/addBalancePost/{{ $walletId }}" method="post">
    @csrf

    <fieldset>
        <!-- balence value -->
        <div class="mb-3">
            <label for="balenceId" class="form-label">Balence</label>
            <input name="balence" type="number" step=".01" min="0" max="999999999" id="balenceId" class="form-control" placeholder="wallet name" required>
        </div>

        <button name="submit" value="plus" class="btn btn-success">+</button>

        <button name="submit" value="minus" class="btn btn-danger" style="margin-left:8px">-</button>
        <br> <br>
        
        @if (Session::get("success"))
            <p class="alert alert-success">{{ Session::get("success") }}</p>
        @elseif (Session::get("fail"))
            <p class="alert alert-danger">{{ Session::get("fail") }}</p>
        @endif
    </fieldset>
</form>
@endsection
