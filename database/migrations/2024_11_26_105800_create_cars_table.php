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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('model');
            $table->string('brand');
            $table->year('year');
            $table->string('matricule')->unique();
            $table->decimal('price_per_day');
            $table->enum('category', ['Economy', 'SUV', 'Luxury', 'Sedan', 'Van', 'Coupe'])->nullable();
            $table->enum('status', ['disponible', 'pas disponible']);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
