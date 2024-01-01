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
            $table->string('descriptionAr');
            $table->boolean('scan');
            $table->boolean('lab');
            $table->unsignedBigInteger(
                'area_id'
            );
            $table->string('description');
            $table->string('image')->nullable();
            $table->foreign('area_id')->references('id')->on('areas');
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
