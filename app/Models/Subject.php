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

    public function fieldOfStudies() {
        return $this->hasMany(FieldOfStudy::class);
    }

    public function classes() {
        return $this->hasMany(Classes::class);
    }
}
