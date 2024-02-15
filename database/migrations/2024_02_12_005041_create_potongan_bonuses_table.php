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
        Schema::create('potongan_bonuses', function (Blueprint $table) {
            $table->id();
            $table->integer('bonus_overtime')->default(20_000);
            $table->integer('potongan_terlambat')->default(20_000);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('potongan_bonuses');
    }
};
