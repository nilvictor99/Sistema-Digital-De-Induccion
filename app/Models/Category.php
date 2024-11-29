<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;


    protected $table = 'categories';

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active'
    ];

    public function contents()
    {
        return $this->hasMany(Content::class);
    }

    /**
     * Relación uno a muchos inversa con el modelo Tool.
     * Esta relación indica que una categoría puede tener varias herramientas.
     */
    public function tools()
    {
        return $this->hasMany(Tool::class);
    }

}
