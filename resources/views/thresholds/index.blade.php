@extends('layouts.app')

@section('content')
@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
<div class="container">
    <a href="{{ route('thresholds.create') }}" class="btn btn-primary"> Add Threshold</a>
    <h2 class="text-center">Thresholds</h2>
    <table class="table">
        <thead>
            <tr>
                <th>Amount</th>
                <th>procedures</th>
            </tr>
        </thead>
        <tbody>
            @foreach($thresholds as $threshold)
                <tr>
                    <td>{{ $threshold->amount }}</td>
                    <td>
                        <a href="{{ route('thresholds.edit', $threshold->id) }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('thresholds.destroy', $threshold->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{ asset('js/app.js') }}"></script>
@endsection
