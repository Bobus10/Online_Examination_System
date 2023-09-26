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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
                $table->foreign('id_user')->references('id')->on('users');
            $table->string('first_name');
            $table->string('surname');
            $table->date('date_of_birth');
            $table->unsignedBigInteger('id_field_of_study');
                $table->foreign('id_field_of_study')->references('id')->on('field_of_studies');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
