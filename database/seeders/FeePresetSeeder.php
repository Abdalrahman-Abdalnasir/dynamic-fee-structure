<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use App\Models\FeePreset;

class FeePresetSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        FeePreset::create(['name' => 'Standard']);
        FeePreset::create(['name' => 'Premium']);
    }
}
