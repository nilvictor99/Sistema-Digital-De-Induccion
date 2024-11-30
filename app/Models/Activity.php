<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    /** @use HasFactory<\Database\Factories\ActivityFactory> */
    use HasFactory;

    protected $table = 'activities';

    protected $fillable = [
        'content_id',
        'name',
        'description',
        'due_date',
        'status',
        'priority',
        'completed_at'
    ];

    public function content()
    {
        return $this->belongsTo(Content::class, 'content_id');
    }
}
