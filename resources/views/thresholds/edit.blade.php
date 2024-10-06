@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center"> Update Threshold</h2>
    <form action="{{ route('thresholds.update', $threshold->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="number" name="amount" class="form-control" value="{{ $threshold->amount }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
