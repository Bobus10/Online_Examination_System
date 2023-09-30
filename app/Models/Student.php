<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'surname',
        'date_of_birth',
    ];

    public function user() {
        return $this->belongsTo(User::class, 'id_user');
    }

    // public function FieldOfStudy() {
    //     return $this->belongsTo(FieldOfStudy::class, 'id_field_of_study');
    // }

    public function yearbook() {
        return $this->belongsTo(Yearbook::class, 'id_student');
    }
}
