<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    public function User() {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function FieldOfStudy() {
        return $this->belongsTo(FieldOfStudy::class, 'id_field_of_study');
    }
}
