@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Update Service</h2>
    <form action="{{ route('services.update', $service->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name"> Name Service:</label>
            <input type="text" name="name" class="form-control" value="{{ $service->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
