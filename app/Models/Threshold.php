<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Threshold extends Model
{
    use HasFactory;
    protected $fillable = ['amount'];
    public function feePercentages()
    {
        return $this->hasMany(FeePercentage::class);
    }   
}
