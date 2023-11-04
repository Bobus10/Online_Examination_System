<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    use HasFactory;

    protected $fillable = [
        'pass_rate',
    ];

    public function subject() {
        return $this->belongsTo(Subject::class);
    }

    public function questions() {
        return $this->hasMany(Question::class, 'exam_id');
    }
}
