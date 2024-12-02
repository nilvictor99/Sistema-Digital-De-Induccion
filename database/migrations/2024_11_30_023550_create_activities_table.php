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
        Schema::create('activities', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')->constrained('contents')->onDelete('cascade'); // Relación con el contenido
            $table->string('name'); // Nombre de la actividad
            $table->text('description')->nullable(); // Descripción de la actividad
            $table->date('due_date')->nullable(); // Fecha límite
            $table->string('status')->default('pending'); // Estado de la actividad
            $table->string('priority')->default('medium'); // Prioridad de la actividad
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activities');
    }
};
