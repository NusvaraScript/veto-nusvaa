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
        Schema::create('vices', function (Blueprint $table) {
            $table->id();
            $table->string('habit_name');
            $table->text('penalty');
            $table->enum('severity', ['rendah', 'medium', 'tinggi']);
            $table->integer('streak_days')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vices');
    }
};
