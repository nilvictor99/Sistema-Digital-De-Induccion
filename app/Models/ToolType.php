<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ToolType extends Model
{
    /** @use HasFactory<\Database\Factories\ToolTypeFactory> */
    use HasFactory;
    protected $table = 'tool_types';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active',
    ];

}
