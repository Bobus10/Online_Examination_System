<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function class() {
        return $this->belongsTo(Classes::class);
    }

    public function instructor() {
        return $this->belongsTo(Instructors::class);
    }

    public function exams() {
        return $this->hasMany(Exams::class);
    }
}
