<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeePercentage extends Model
{
    use HasFactory;

    protected $fillable = ['fee_preset_id', 'service_id', 'threshold_id', 'percentage'];

    // علاقة مع نموذج FeePreset
    public function feePreset()
    {
        return $this->belongsTo(FeePreset::class);
    }

    // علاقة مع نموذج Service
    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    // علاقة مع نموذج Threshold
    public function threshold()
    {
        return $this->belongsTo(Threshold::class);
    }
}
