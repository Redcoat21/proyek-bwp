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
        Schema::create('course', function (Blueprint $table) {
            $table->unsignedInteger('id')->autoIncrement();
            $table->string('name', 300);
            $table->boolean('status');

            $table->string('teacher', 300);
            $table->foreign('teacher')->references('username')->on('user');
            $table->unsignedTinyInteger('category');
            $table->foreign('category')->references('id')->on('category');
            $table->unsignedTinyInteger('difficulty');
            $table->foreign('difficulty')->references('id')->on('difficulty');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('courses');
    }
};
