<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yearbook extends Model
{
    use HasFactory;

    protected $fillable = [
        'academic_year',
    ];

    public function students() {
        return $this->hasMany(Student::class, 'id_student');
    }

    public function fieldOfStudy() {
        return $this->belongsTo(FieldOfStudy::class, 'id_field_of_study');
    }

    public function classes() {
        return $this->hasMany(Classes::class, 'id_yearbook');
    }
}
