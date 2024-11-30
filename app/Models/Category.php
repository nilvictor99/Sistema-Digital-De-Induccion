<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;


    protected $table = 'categories';

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

    public function tools()
    {
        return $this->hasMany(Tool::class);
    }

}
