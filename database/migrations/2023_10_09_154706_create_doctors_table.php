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
            $table->string('الاسم');
            $table->string('name');
            $table->string('Specialization');
            $table->string('image');
            $table->string('address')->nullable();
            $table->unsignedBigInteger('health_center_id')->nullable();

            $table->foreign('health_center_id')->references('id')->on('health_centers');
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
