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
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('الاسم');
            $table->string('name');
            $table->string('descriptionEn');
            $table->string('descriptionAr');
            $table->string('image')->nullable();
            $table->unsignedBigInteger('service_group_id')->nullable();

            $table->foreign('service_group_id')->references('id')->on('service_groups');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
