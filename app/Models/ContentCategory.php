<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentCategory extends Model
{
    /** @use HasFactory<\Database\Factories\ContentCategoryFactory> */
    use HasFactory;

    protected $table = 'content_categories';

    public $timestamps = true;

    protected $fillable = ['content_id', 'category_id'];

    public function content()
    {
        return $this->belongsTo(Content::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
