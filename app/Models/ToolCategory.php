<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ToolCategoryFactory> */
    use HasFactory;

    protected $table = 'tool_categories';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active'
    ];

    public function tools()
    {
        return $this->hasMany(Tool::class);
    }
}
