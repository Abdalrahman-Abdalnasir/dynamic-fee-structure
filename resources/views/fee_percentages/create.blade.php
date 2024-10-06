@extends('layouts.app')


@section('content')
<div class="container">
    <h2 class="text-center"> Add a fee percentage </h2>
    <form action="{{ route('fee-percentages.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="fee_preset_id"> Preset:</label>
            <select name="fee_preset_id" class="form-control" required>
                @foreach($presets as $preset)
                    <option value="{{ $preset->id }}">{{ $preset->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="service_id">Service:</label>
            <select name="service_id" class="form-control" required>
                @foreach($services as $service)
                    <option value="{{ $service->id }}">{{ $service->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="threshold_id">Threshold:</label>
            <select id="threshold_id" name="threshold_id" class="form-control" required>
                @foreach($thresholds as $threshold)
                    <option value="{{ $threshold->id }}" data-percentage="{{ $threshold->percentage }}">{{ $threshold->amount }}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>


<script>
    $(document).ready(function() {
        $('#threshold_id').on('change', function() {
            var selectedOption = $(this).find('option:selected');
            var percentage = selectedOption.data('percentage'); // الحصول على النسبة من البيانات المخزنة
            $('#percentage').val(percentage); // تعيين النسبة في حقل النسبة
        });
    });
</script>
@endsection
