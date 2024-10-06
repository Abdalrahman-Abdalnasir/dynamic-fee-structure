@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center"> Add Threshold</h2>
    <form action="{{ route('thresholds.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
