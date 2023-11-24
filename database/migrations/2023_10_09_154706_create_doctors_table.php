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
            $table->integer('fee');
            $table->integer('السعر');
            $table->integer('rating');
            $table->string('title');
            $table->string('اللقب');
            $table->string('image')->nullable();
            $table->string('address')->nullable();
            $table->string('العنوان')->nullable();
            $table->unsignedBigInteger('health_center_id')->nullable();
            $table->unsignedBigInteger('specialization_id');

            $table->foreign('health_center_id')->references('id')->on('health_centers');
            $table->foreign('specialization_id')->references('id')->on('specializations');
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
