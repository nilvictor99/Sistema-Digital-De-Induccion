<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Relación con la tabla users
            $table->string('last_name')->nullable(); // Apellidos del usuario
            $table->string('city')->nullable(); // Ciudad del usuario
            $table->string('phone')->nullable(); // Teléfono del usuario
            $table->text('bio')->nullable(); // Biografía o descripción adicional del usuario
            $table->string('profile_picture')->nullable(); // Foto de perfil
            $table->timestamps();
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
