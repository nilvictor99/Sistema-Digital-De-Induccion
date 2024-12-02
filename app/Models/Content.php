<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    /** @use HasFactory<\Database\Factories\ContentFactory> */
    use HasFactory;

    protected $table = 'contents';

    protected $fillable = [
        'title',
        'description',
        'link',
        'file_path',
        'content_type_id',
        'is_active',
        'published_at',
        'created_by'
    ];

    public function contentType()
    {
        return $this->belongsTo(ContentType::class);
    }

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }


    public function categories()
    {
        return $this->belongsToMany(Category::class, 'content_categories');
    }

    public function tools()
    {
        return $this->belongsToMany(Tool::class, 'content_tools');
    }

    public function activities()
    {
        return $this->hasMany(Activity::class, 'content_id');
    }
}
