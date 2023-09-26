<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOfStudy extends Model
{
    use HasFactory;

    public function Subjects() {
        return $this->hasMany(Subject::class, 'id_field_of_study');
    }

    public function Students() {
        return $this->hasMany(Student::class, 'id_field_of_study');
    }
}
