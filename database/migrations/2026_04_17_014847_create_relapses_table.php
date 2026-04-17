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
        Schema::create('relapses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vices_id')->constrained('vices')->cascadeOnDelete();
            $table->date('violation_date');
            $table->string('excuse');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relapses');
    }
};
