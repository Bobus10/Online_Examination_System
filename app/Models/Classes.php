<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function yearbook() {
        return $this->belongsTo(Yearbook::class);
    }

    public function students() {
        return $this->hasMany(Student::class);
    }

    public function exams() {
        return $this->hasMany(Exams::class);
    }
}
