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
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('patient_name');
            $table->string('phone');
            $table->string('email');
            $table->dateTime('date');
            $table->string('diagnose')->nullable();
            $table->string('location')->nullable();
            $table->string('description')->nullable();
            $table->string('payment')->nullable();
            $table->enum('status', ['submitted', 'confirmed', 'done', 'cancelled', 'rescheduled']);
            $table->unsignedBigInteger('doctor_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('health_center_id')->nullable();


            $table->foreign('health_center_id')->references('id')->on('health_centers');
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
