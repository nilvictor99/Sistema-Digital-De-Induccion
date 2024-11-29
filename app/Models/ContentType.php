<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentType extends Model
{
    /** @use HasFactory<\Database\Factories\ContentTypeFactory> */
    use HasFactory;
    protected $table = 'content_types';

    protected $fillable = [
        'name',
        'slug',
        'description',
        'is_active'
    ];

    // Relación uno a muchos con Content
    public function contents()
    {
        return $this->hasMany(Content::class);
    }
}
