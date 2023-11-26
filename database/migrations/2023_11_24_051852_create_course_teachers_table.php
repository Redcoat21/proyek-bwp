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
        Schema::create('certificate', function (Blueprint $table) {
            $table->string('username', 300);
            $table->unsignedInteger('course');

            $table->foreign('username')->references('username')->on('user');
            $table->foreign('course')->references('id')->on('course');

            $table->primary(['username', 'course']);
            $table->date('start');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('course_teachers');
    }
};
