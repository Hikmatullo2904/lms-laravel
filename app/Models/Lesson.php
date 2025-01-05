<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the course section that owns the Lesson
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function courseSection(): BelongsTo
    {
        return $this->belongsTo(CourseSection::class);
    }

}
