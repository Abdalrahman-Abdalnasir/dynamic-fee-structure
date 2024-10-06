@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center">Update a fee percentage</h2>
    <form action="{{ route('fee-percentages.update', $fee->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="fee_preset_id">Preset:</label>
            <select name="fee_preset_id" class="form-control" required>
                @foreach($presets as $preset)
                    <option value="{{ $preset->id }}" {{ $preset->id == $fee->fee_preset_id ? 'selected' : '' }}>{{ $preset->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Service:</label>
            <select name="service_id" class="form-control" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}" {{ $service->id == $fee->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="threshold_id">Threshold:</label>
            <select id="threshold_id" name="threshold_id" class="form-control" required>
                @foreach($thresholds as $threshold)
                    <option value="{{ $threshold->id }}" data-percentage="{{ $threshold->percentage }}" {{ $threshold->id == $fee->threshold_id ? 'selected' : '' }}>{{ $threshold->amount }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="percentage">Percentage:</label>
            <input type="number" name="percentage" id="percentage" class="form-control" value="{{ $fee->percentage }}" required readonly>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script>
    $(document).ready(function() {
        // Update the percentage field when the threshold changes
        $('#threshold_id').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var percentage = selectedOption.data('percentage'); // Get the percentage from the selected option
            $('#percentage').val(percentage); // Set the percentage in the input field
        });
    });
</script>
@endsection
