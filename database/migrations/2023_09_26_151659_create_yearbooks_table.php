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
            $table->foreignId('degree_course_id')->constrained('degree_courses')->cascadeOnUpdate()->cascadeOnDelete();
            $table->smallInteger('academic_year');
            // todo change academic_year to session
            // $table->smallInteger('session');
            //     $table->unique(['session', 'degree_course_id']);
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
