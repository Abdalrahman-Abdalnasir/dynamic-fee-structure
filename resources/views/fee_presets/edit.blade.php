@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center"> Update Graphic Presets </h2>
    <form action="{{ route('fee-presets.update', $preset->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Preset name:</label>
            <input type="text" name="name" class="form-control" value="{{ $preset->name }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
