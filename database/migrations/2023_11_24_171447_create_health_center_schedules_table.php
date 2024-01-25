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
        Schema::create('health_center_schedules', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('center_id');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->string('dateAr');
            $table->string('start_timeAr');
            $table->string('end_timeAr');
            $table->timestamps();

            $table->foreign('center_id')->references('id')->on('health_centers')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_center_schedules');
    }
};
