<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'yearbook_id',
        'instructor_id',
    ];

    public function class() {
        return $this->belongsTo(Classes::class);
    }

    // public function instructor() {
    //     return $this->belongsTo(Instructor::class);
    // }

    public function instructors() {
        return $this->belongsToMany(Instructor::class);
    }

    public function exams() {
        return $this->hasMany(Exam::class);
    }
}
