<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Threshold;


class ThresholdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Threshold::create(['amount' => 100, 'percentage' => 5]);
        Threshold::create(['amount' => 200, 'percentage' => 4]);
    }
}
