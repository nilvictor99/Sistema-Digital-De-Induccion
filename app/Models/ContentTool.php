<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentTool extends Model
{
    /** @use HasFactory<\Database\Factories\ContentToolFactory> */
    use HasFactory;

    protected $table = 'content_tools';

    public $timestamps = true;

    protected $fillable = ['content_id', 'tool_id'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function tool()
    {
        return $this->belongsTo(Tool::class);
    }
}
