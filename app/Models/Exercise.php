<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = [
        'content',
        'parent_id',
        'lesson_id',
        'created_by',
        'updated_by',
    ];

    public function lesson()
    {
        return $this->belongsTo(Lesson::class);
    }

    public function parent()
    {
        return $this->belongsTo(Exercise::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Exercise::class, 'parent_id');
    }
}
