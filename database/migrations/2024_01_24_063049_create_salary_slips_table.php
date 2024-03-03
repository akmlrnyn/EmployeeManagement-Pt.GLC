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
        Schema::create('salary_slips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->enum('month', ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December']);
            $table->integer('leave_request');
            $table->integer('overtime')->nullable();
            $table->integer('late')->nullable();
            $table->bigInteger('tax');  
            $table->integer('bpjs');
            $table->bigInteger('salary');
            $table->bigInteger('bonus')->nullable();
            $table->bigInteger('deduction')->nullable();
            $table->string('information');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salary_slips');
    }
};
