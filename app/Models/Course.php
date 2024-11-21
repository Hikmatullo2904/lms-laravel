<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Course extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function sections() : HasMany {
        return $this->hasMany(CourseSection::class);
    }

    public function lessons() : HasManyThrough {
        return $this->HasManyThrough(Lesson::class, CourseSection::class);
    }

    public function category() : BelongsTo {
        return $this->belongsTo(Category::class);
    }
}
