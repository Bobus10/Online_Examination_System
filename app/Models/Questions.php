<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Questions extends Model
{
    use HasFactory;

    public function exam() {
        return $this->belongsTo(Exams::class, 'exam_id');
    }

    public function answers() {
        return $this->hasMany(Answers::class, 'question_id');
    }
}
