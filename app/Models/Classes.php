<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;

    public function yearbook() {
        return $this->belongsTo(Yearbook::class, 'id_yearbook');
    }

    public function subject() {
        return $this->belongsTo(Subject::class, 'id_subject');
    }

    public function instructor() {
        return $this->belongsTo(Instructors::class, 'id_instructor');
    }

    public function exams() {
        return $this->hasMany(Exams::class, 'class_id');
    }
}
