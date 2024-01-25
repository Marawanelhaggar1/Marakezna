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
        Schema::create('mobile_settings', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('name');
            $table->string('nameAr');
            $table->string('logo');
            $table->string('address')->nullable();
            $table->string('addressAr')->nullable();
            $table->string('phone');
            $table->string('background1');
            $table->string('background2');
            $table->string('phoneAr');
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('twitter')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mobile_settings');
    }
};
