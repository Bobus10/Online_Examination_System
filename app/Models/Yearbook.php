<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Yearbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'degree_course_id',
        'academic_year',
    ];

    public function degreeCourse() {
        return $this->belongsTo(DegreeCourse::class);
    }

    public function classes() {
        return $this->hasMany(Classes::class);
    }

    public function subjects() {
        return $this->hasMany(Subject::class);
    }
}
