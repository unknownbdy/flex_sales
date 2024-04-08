<?php

namespace App\Models\Course;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CourseLink extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'course_links';
    protected $fillable = [
        'name',
        'name_arabic',
        'link',
        'chapter_id',
        'course_id',
        'points'
    ];
}
