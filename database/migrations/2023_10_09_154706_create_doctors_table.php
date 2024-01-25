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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->string('nameAr');
            $table->string('nameEn');
            $table->integer('feeEn');
            $table->integer('waiting');
            $table->string('feeAr');
            $table->string('ratingAr')->nullable();
            $table->integer('ratingEn')->nullable();
            $table->string('titleEn');
            $table->string('titleAr');
            $table->boolean('featured');
            $table->boolean('appointment');
            $table->string('image')->nullable();
            $table->string('addressEn')->nullable();
            $table->string('phone')->nullable();
            $table->string('whatsApp')->nullable();
            $table->string('addressAr')->nullable();
            $table->unsignedBigInteger('health_center_id')->nullable();
            $table->unsignedBigInteger('specialization_id');

            $table->foreign('health_center_id')->references('id')->on('health_centers')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('specialization_id')->references('id')->on('specializations')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
