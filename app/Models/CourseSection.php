<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CourseSection extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }
}
