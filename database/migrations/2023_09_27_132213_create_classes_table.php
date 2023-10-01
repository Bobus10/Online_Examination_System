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
        Schema::create('classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_yearbook');
                $table->foreign('id_yearbook')->references('id')->on('yearbooks')->cascadeOnDelete();
            $table->unsignedBigInteger('id_subject');
                $table->foreign('id_subject')->references('id')->on('subjects')->cascadeOnDelete();
            $table->unsignedBigInteger('id_instructor');
                $table->foreign('id_instructor')->references('id')->on('instructors')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
