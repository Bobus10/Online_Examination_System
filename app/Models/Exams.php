<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exams extends Model
{
    use HasFactory;

    public function classes() {
        return $this->belongsToMany(Classes::class, 'class_id');
    }

    public function questions() {
        return $this->hasMany(Questions::class, 'exam_id');
    }
}
