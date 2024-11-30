<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tool extends Model
{
    /** @use HasFactory<\Database\Factories\ToolFactory> */
    use HasFactory;

    protected $table = 'tools';

    protected $fillable = [
        'name',
        'description',
        'link',
        'tool_type_id',
    ];

    public function toolCategory()
    {
        return $this->belongsTo(ToolCategory::class);
    }

    public function toolType()
    {
        return $this->belongsTo(ToolType::class);
    }
}
