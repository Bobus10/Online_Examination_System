<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FieldOfStudy extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
    ];

    public function subjects() {
        return $this->hasMany(Subject::class, 'id_field_of_study');
    }

    // public function Students() {
    //     return $this->hasMany(Student::class, 'id_field_of_study');
    // }

    public function yearbooks() {
        return $this->hasMany(Yearbook::class, 'id_field_of_study');
    }

    public function classes() {
        return $this->hasManyThrough(Classes::class, Yearbook::class, 'id_field_of_study', 'id_yearbook', 'id', 'id');
    }
}
