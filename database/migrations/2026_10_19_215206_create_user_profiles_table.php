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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id(); // Klucz główny (AUTO_INCREMENT, BIGINT)
            $table->string('name'); // Kolumna VARCHAR na imię
            $table->string('email')->unique(); // Unikalny email
            $table->string('password'); // Zaszyfrowane hasło
            $table->timestamps(); // Automatyczne kolumny created_at i updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
