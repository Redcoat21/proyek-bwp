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
        Schema::create('subcourses', function (Blueprint $table) {
            $table->id();

            $table->string('name', 200);
            $table->string('description', 500);
            $table->unsignedBigInteger('course');
            $table->json('data')->nullable();

            $table->foreign('course')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcourses');
    }
};
