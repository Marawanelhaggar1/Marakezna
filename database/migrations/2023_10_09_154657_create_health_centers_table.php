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
        Schema::create('health_centers', function (Blueprint $table) {
            $table->id();
            $table->string('nameEn');
            $table->string('nameAr');
            $table->string('address');
            $table->string('addressAr');
            $table->string('description1Ar');
            $table->boolean('scan');
            $table->boolean('lab');
            // $table->unsignedBigInteger(
            //     'area_id'
            // );
            $table->string('description1');
            $table->string('description2')->nullable();
            $table->string('description2Ar')->nullable();
            $table->string('phone');
            $table->string('whatsApp');
            $table->string('image')->nullable();
            // $table->foreign('area_id')->references('id')->on('areas')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('health_centers');
    }
};
