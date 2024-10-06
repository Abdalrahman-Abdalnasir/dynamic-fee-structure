<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FeePreset extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    public function feePercentages()
    {
        return $this->hasMany(FeePercentage::class);
    }   
}
