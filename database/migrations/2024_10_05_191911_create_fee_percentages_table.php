<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('fee_percentages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('fee_preset_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('threshold_id')->constrained();
            $table->decimal('percentage'); // النسبة المئوية
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fee_percentages');
    }
};
