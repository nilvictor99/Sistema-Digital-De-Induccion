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
        'tool_id',
        'category_id',
    ];

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

}
