@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center"> Add a Service </h2>
    <form action="{{ route('services.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name Service:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
