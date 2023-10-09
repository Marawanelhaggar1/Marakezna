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
        Schema::create('patients', function (Blueprint $table) {
            $table->id();
            $table->string('الاسم');
            $table->string('name');
            $table->string('email');
            $table->string('المرض');
            $table->string('disease');

            $table->unsignedBigInteger('health_center_id')->nullable();
            $table->unsignedBigInteger('doctor_id');

            $table->foreign('health_center_id')->references('id')->on('health_centers');
            $table->foreign('doctor_id')->references('id')->on('doctors');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('patients');
    }
};
