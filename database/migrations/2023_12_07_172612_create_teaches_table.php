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
        Schema::create('teaches', function (Blueprint $table) {
            $table->id();

            $table->string('lecturer', 100);
            $table->unsignedBigInteger('course');

            $table->foreign('lecturer')->references('username')->on('users');
            $table->foreign('course')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teaches');
    }
};
