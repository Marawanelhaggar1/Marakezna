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
        Schema::create('about_us', function (Blueprint $table) {
            $table->id();
            $table->string('image');
            $table->string('title');
            $table->string('titleAr');
            $table->text('paragraph');
            $table->text('paragraphAr');
            $table->text('mission');
            $table->text('missionAr');
            $table->text('values');
            $table->text('valuesAr');
            $table->text('vision');
            $table->text('visionAr');
            $table->string('videoLink')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_us');
    }
};
