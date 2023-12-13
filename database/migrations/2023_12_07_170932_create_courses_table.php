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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name', 200);
            $table->boolean('status');
            $table->string('lecturer', 100);
            $table->unsignedBigInteger('difficulty');
            $table->unsignedBigInteger('category');

            $table->foreign('lecturer')->references('username')->on('lecturers');
            $table->foreign('difficulty')->references('id')->on('difficulties');
            $table->foreign('category')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('models');
    }
};
