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
        Schema::create('opertation_lists', function (Blueprint $table) {
            $table->id();
            $table->string('category')->unique();
            $table->string('patient_id')->nullable();
            $table->foreignId('surgery_id')->constrained('surgery_types');
            $table->longText('diagnosis')->nullable();
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opertation_lists');
    }
};
