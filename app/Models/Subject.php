<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    public function FieldOfStudies() {
        return $this->hasMany(FieldOfStudy::class, 'id_field_of_study');
    }
}
