<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseSection extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the course that owns the CourseSection
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function course() : BelongsTo {
        return $this->belongsTo(Course::class);
    }

    /**
     * The lessons that belong to the CourseSection
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function lessons() : HasMany {
        return $this->hasMany(Lesson::class);
    }
}
