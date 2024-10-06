@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">  Create Graphic Presets </h2>
    <form action="{{ route('fee-presets.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name"> Preset name:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>
@endsection
