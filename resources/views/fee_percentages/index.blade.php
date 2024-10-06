@extends('layouts.app')

@section('content')
@if (session('success'))
    <div id="success-message" class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
    <div class="container">
        <a href="{{ route('fee-percentages.create') }}" class="btn btn-primary"> Add a fee percentage </a>
        <h2 class="text-center"> Fee Rates</h2>
        <table class="table">
            <thead>
                <tr>
                    <th> Preset</th>
                    <th>Service</th>
                    <th> Threshold</th>
                    <th> Percentage</th>
                    <th>Procedures</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fees as $fee)
                    <tr>
                        <td>{{ $fee->feePreset->name }}</td>
                        <td>{{ $fee->service->name }}</td>
                        <td>{{ $fee->threshold->amount }}</td>
                        <td>{{ $fee->percentage }}%</td>
                        <td>
                            <a href="{{ route('fee-percentages.edit', $fee->id) }}" class="btn btn-warning">Update</a>
                            <form action="{{ route('fee-percentages.destroy', $fee->id) }}" method="POST"
                                style="display:inline;">
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
