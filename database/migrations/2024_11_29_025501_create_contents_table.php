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
        Schema::create('contents', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Título del contenido
            $table->text('description')->nullable(); // Descripción del contenido
            $table->string('file_path')->nullable(); // Ruta al archivo asociado al contenido
            $table->foreignId('content_type_id')->constrained(); // Relación con content_types
            $table->boolean('is_active')->default(true); // Indica si el contenido está activo
            $table->timestamp('published_at')->nullable(); // Fecha y hora de publicación
            $table->foreignId('created_by')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contents');
    }
};
