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
        Schema::create('yearbooks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_student');
                $table->foreign('id_student')->references('id')->on('students');
            $table->unsignedBigInteger('id_field_of_study');
                $table->foreign('id_field_of_study')->references('id')->on('field_of_studies')->cascadeOnDelete();
            $table->unsignedSmallInteger('academic_year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('yearbooks');
    }
};
