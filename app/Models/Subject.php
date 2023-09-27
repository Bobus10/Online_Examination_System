<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function fieldOfStudies() {
        return $this->hasMany(FieldOfStudy::class, 'id_field_of_study');
    }

    public function classes() {
        return $this->hasMany(Classes::class, 'id_subject');
    }
}
