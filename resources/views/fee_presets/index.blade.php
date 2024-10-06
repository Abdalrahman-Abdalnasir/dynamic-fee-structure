@extends('layouts.app')

@section('content')
    @if (session('success'))
        <div id="success-message" class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="container">
        <a href="{{ route('fee-presets.create') }}" class="btn btn-primary"> Add a preset</a>
        <h2 class="text-center">Graphic presets</h2>

        <table class="table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>procedures</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($presets as $preset)
                    <tr>
                        <td>{{ $preset->name }}</td>
                        <td>
                            <a href="{{ route('fee-presets.edit', $preset->id) }}" class="btn btn-warning">Update</a>
                            <form action="{{ route('fee-presets.destroy', $preset->id) }}" method="POST"
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
