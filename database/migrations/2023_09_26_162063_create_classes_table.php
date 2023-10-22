<?php


use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('classes', function (Blueprint $table) {
        $table->id();
        $table->char('label', 1);
            $table->unique(['label', 'yearbook_id']);
        $table->foreignId('yearbook_id')->constrained('yearbooks')->cascadeOnUpdate()->cascadeOnDelete();
        $table->timestamps();
        });
    }

    /**
     *
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('classes');
    }
};
