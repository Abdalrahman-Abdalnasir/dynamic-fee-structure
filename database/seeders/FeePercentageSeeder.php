<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\FeePercentage;


class FeePercentageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        FeePercentage::create(['fee_preset_id' => 1, 'service_id' => 1, 'threshold_id' => 1, 'percentage' => 5]);
        FeePercentage::create(['fee_preset_id' => 1, 'service_id' => 1, 'threshold_id' => 2, 'percentage' => 4]);
        FeePercentage::create(['fee_preset_id' => 2, 'service_id' => 1, 'threshold_id' => 1, 'percentage' => 3]);
        FeePercentage::create(['fee_preset_id' => 2, 'service_id' => 1, 'threshold_id' => 2, 'percentage' => 2]);
    }
}
